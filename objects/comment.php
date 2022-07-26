<?php
global $global, $config;
if (!isset($global['systemRootPath'])) {
    require_once '../videos/configuration.php';
}

require_once $global['systemRootPath'] . 'objects/bootGrid.php';
require_once $global['systemRootPath'] . 'objects/user.php';
require_once $global['systemRootPath'] . 'objects/video.php';

class Comment
{
    protected $id;
    protected $comment;
    protected $videos_id;
    protected $users_id;
    protected $comments_id_pai;

    public function __construct($comment, $videos_id, $id = 0)
    {
        if (empty($id)) {
            // get the comment data from comment
            $this->comment = xss_esc($comment);
            $this->videos_id = $videos_id;
            $this->users_id = User::getId();
        } else {
            // get data from id
            $this->load($id);
        }
    }

    public function getId()
    {
        return $this->id;
    }


    public function setComments_id_pai($comments_id_pai)
    {
        $this->comments_id_pai = $comments_id_pai;
    }

    public function getComments_id_pai()
    {
        return $this->comments_id_pai;
    }

    public function getUsers_id()
    {
        return $this->users_id;
    }

    public function setComment($comment)
    {
        $this->comment = xss_esc($comment);
    }

    public function getVideos_id()
    {
        return $this->videos_id;
    }

    public function load($id)
    {
        $row = $this->getComment($id);
        if (empty($row)) {
            return false;
        }
        foreach ($row as $key => $value) {
            $this->$key = $value;
        }
        return true;
    }

    public function save()
    {
        global $global;
        if (!User::isLogged()) {
            header('Content-Type: application/json');
            die('{"error":"'.__("Permission denied").'"}');
        }
        //$this->comment = htmlentities($this->comment);
        $this->comment = ($this->comment);

        if (empty($this->comment)) {
            return false;
        }

        if (empty($this->comments_id_pai)) {
            $this->comments_id_pai = 'NULL';
        }

        if (empty($this->videos_id) && !empty($this->comments_id_pai)) {
            $comment = new Comment("", 0, $this->comments_id_pai);
            $this->videos_id = $comment->getVideos_id();
        }

        if (!empty($this->id)) {
            if (!self::userCanAdminComment($this->id)) {
                return false;
            }
            $sql = "UPDATE comments SET "
                    . " comment = ?, modified = now() WHERE id = ?";
            $resp = sqlDAL::writeSql($sql, "si", [xss_esc($this->comment),$this->id]);
        } else {
            $id = User::getId();
            $sql = "INSERT INTO comments ( comment,users_id, videos_id, comments_id_pai, created, modified) VALUES "
                    . " (?, ?, ?, {$this->comments_id_pai}, now(), now())";
            $resp = sqlDAL::writeSql($sql, "sii", [xss_esc($this->comment),$id,$this->videos_id]);
        }
        if ((empty($resp))&&($global['mysqli']->errno!=0)) {
            die('Error (comment save) : (' . $global['mysqli']->errno . ') ' . $global['mysqli']->error);
        }
        if (empty($this->id)) {
            // log_error("note: insert_id works? ".$global['mysqli']->insert_id); // success!
            $id = $global['mysqli']->insert_id;
            $this->id = $id;
        } else {
            $id = $this->id;
        }
        if (empty($this->comments_id_pai) || $this->comments_id_pai== 'NULL') {
            AVideoPlugin::afterNewComment($this->id);
        } else {
            AVideoPlugin::afterNewResponse($this->id);
        }
        return $resp;
    }

    public function delete()
    {
        if (!self::userCanAdminComment($this->id)) {
            return false;
        }

        global $global;
        if (!empty($this->id)) {
            $sql = "DELETE FROM comments WHERE id = ?";
        } else {
            return false;
        }
        return sqlDAL::writeSql($sql, "i", [$this->id]);
    }

    private function getComment($id)
    {
        global $global;
        $id = intval($id);
        $sql = "SELECT * FROM comments WHERE  id = ? LIMIT 1";
        $res = sqlDAL::readSql($sql, "i", [$id]);
        $result = sqlDAL::fetchAssoc($res);
        sqlDAL::close($res);
        return ($res!=false) ? $result : false;
    }

    public static function getAllComments($videoId = 0, $comments_id_pai = 'NULL')
    {
        global $global;
        $format = '';
        $values = [];
        $sql = "SELECT c.*, u.name as name, u.user as user, "
                . " (SELECT count(id) FROM comments_likes as l where l.comments_id = c.id AND `like` = 1 ) as likes, "
                . " (SELECT count(id) FROM comments_likes as l where l.comments_id = c.id AND `like` = -1 ) as dislikes ";

        if (User::isLogged()) {
            $sql .= ", (SELECT `like` FROM comments_likes as l where l.comments_id = c.id AND users_id = ? ) as myVote ";
            $format .= "i";
            $values[]=User::getId();
        } else {
            $sql .= ", 0 as myVote ";
        }

        $sql .= " FROM comments c LEFT JOIN users as u ON u.id = users_id LEFT JOIN videos as v ON v.id = videos_id WHERE 1=1 ";

        if (!empty($videoId)) {
            $sql .= " AND videos_id = ? ";
            $format .= "i";
            $values[] = $videoId;
        } elseif (!Permissions::canAdminComment() && empty($comments_id_pai)) {
            if (!User::isLogged()) {
                die("can not see comments");
            }
            $users_id = User::getId();
            $sql .= " AND (v.users_id = ? OR c.users_id = ?) ";
            $format .= "ii";
            $values[]=$users_id;
            $values[]=$users_id;
        }

        if ($comments_id_pai==='NULL' || empty($comments_id_pai)) {
            $sql .= " AND (comments_id_pai IS NULL ";
            if (empty($videoId) && User::isLogged()) {
                $users_id = User::getId();
                $sql .= " OR c.users_id = ? ";
                $format .= "i";
                $values[]=$users_id;
            }
            $sql .= ") ";
        } else {
            $sql .= " AND comments_id_pai = ? ";
            $format .= "s";
            $values[]=$comments_id_pai;
        }

        $sql .= BootGrid::getSqlFromPost(['name']);
        $res = sqlDAL::readSql($sql, $format, $values);
        $allData = sqlDAL::fetchAllAssoc($res);
        sqlDAL::close($res);
        $comment = [];
        if ($res!=false) {
            foreach ($allData as $row) {
                $row = cleanUpRowFromDatabase($row);
                $row['comment'] = str_replace('\n', "\n", $row['comment']);
                $row['commentPlain'] = xss_esc_back($row['comment']);
                $row['commentHTML'] = nl2br($row['commentPlain']);
                $comment[] = $row;
            }
            //$comment = $res->fetch_all(MYSQLI_ASSOC);
        } else {
            $comment = false;
            die($sql.'\nError : (' . $global['mysqli']->errno . ') ' . $global['mysqli']->error);
        }
        return $comment;
    }

    public static function getTotalComments($videoId = 0, $comments_id_pai = 'NULL', $video_owner_users_id=0)
    {
        global $global;
        $format = '';
        $values = [];
        $sql = "SELECT c.id FROM comments c LEFT JOIN users as u ON u.id = users_id LEFT JOIN videos as v ON v.id = videos_id WHERE 1=1  ";

        if (!empty($videoId)) {
            $sql .= " AND videos_id = ? ";
            $format .= "i";
            $values[] = $videoId;
        } elseif (!Permissions::canAdminComment() && empty($comments_id_pai)) {
            if (!User::isLogged()) {
                die("can not see comments");
            }
            $users_id = User::getId();
            $sql .= " AND (v.users_id = ? OR c.users_id = ?) ";
            $format .= "ii";
            $values[] = $users_id;
            $values[] = $users_id;
        }

        if ($comments_id_pai==='NULL' || empty($comments_id_pai)) {
            $sql .= " AND (comments_id_pai IS NULL ";
            if (empty($videoId) && User::isLogged()) {
                $users_id = User::getId();
                $sql .= " OR c.users_id = ? ";
                $format .= "i";
                $values[] = $users_id;
            }
            $sql .= ") ";
        } else {
            $sql .= " AND comments_id_pai = ? ";
            $format .= "s";
            $values[] = $comments_id_pai;
        }

        if (!empty($video_owner_users_id)) {
            $sql .= " AND v.users_id = ? ";
            $format .= "i";
            $values[] = $video_owner_users_id;
        }

        $sql .= BootGrid::getSqlSearchFromPost(['name']);

        $res = sqlDAL::readSql($sql, $format, $values);
        $countRow = sqlDAL::num_rows($res);
        sqlDAL::close($res);

        return $countRow;
    }

    public static function userCanAdminComment($comments_id)
    {
        if (!User::isLogged()) {
            return false;
        }
        if (Permissions::canAdminComment()) {
            return true;
        }
        $obj = new Comment("", 0, $comments_id);
        if ($obj->users_id == User::getId()) {
            return true;
        }
        $video = new Video("", "", $obj->videos_id);
        if ($video->getUsers_id() == User::getId()) {
            return true;
        }
        return false;
    }

    public static function userCanEditComment($comments_id)
    {
        if (!User::isLogged()) {
            return false;
        }
        if (Permissions::canAdminComment()) {
            return true;
        }
        $obj = new Comment("", 0, $comments_id);
        if ($obj->users_id == User::getId()) {
            return true;
        }
        return false;
    }

    public static function getTotalCommentsThumbsUpFromUser($users_id, $startDate, $endDate)
    {
        global $global;
        $sql = "SELECT id from comments  WHERE users_id = ?";
        $res = sqlDAL::readSql($sql, "i", [$users_id]);
        $fullData = sqlDAL::fetchAllAssoc($res);
        sqlDAL::close($res);
        $r = ['thumbsUp'=>0, 'thumbsDown'=>0 ];
        if ($res!=false) {
            foreach ($fullData as $row) {
                $format = "i";
                $values = [$row['id']];
                $sql = "SELECT id from comments_likes WHERE comments_id = ? AND `like` = 1  ";
                if (!empty($startDate)) {
                    $sql .= " AND `created` >= ? ";
                    $format .= "s";
                    $values[] = $startDate;
                }
                if (!empty($endDate)) {
                    $sql .= " AND `created` <= ? ";
                    $format .= "s";
                    $values[] = $endDate;
                }
                $res = sqlDAL::readSql($sql, $format, $values);
                $countRow = sqlDAL::num_rows($res);
                sqlDAL::close($res);
                $r['thumbsUp']+=$countRow;
                $format = "i";
                $values = [$row['id']];
                $sql = "SELECT id from comments_likes WHERE comments_id = ? AND `like` = -1  ";
                if (!empty($startDate)) {
                    $sql .= " AND `created` >= ? ";
                    $format .= "s";
                    $values[] = $startDate;
                }
                if (!empty($endDate)) {
                    $sql .= " AND `created` <= ? ";
                    $format .= "s";
                    $values[] = $endDate;
                }
                $res = sqlDAL::readSql($sql, $format, $values);
                $countRow = sqlDAL::num_rows($res);
                sqlDAL::close($res);
                $r['thumbsDown']+=$countRow;
            }
        }
        return $r;
    }
    
    static function addExtraInfo($commentsArray){
        foreach ($commentsArray as $key2 => $value2) {
            $user = new User($value2['users_id']);
            $commentsArray[$key2]['userPhotoURL'] = User::getPhoto($value2['users_id']);
            $commentsArray[$key2]['userName'] = User::getNameIdentificationById($value2['users_id']);
        }
        return $commentsArray;
    }
}
