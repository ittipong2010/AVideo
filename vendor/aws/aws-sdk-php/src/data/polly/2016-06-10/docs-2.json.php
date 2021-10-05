<?php
// This file was auto-generated from sdk-root/src/data/polly/2016-06-10/docs-2.json
return [ 'version' => '2.0', 'service' => '<p>Amazon Polly is a web service that makes it easy to synthesize speech from text.</p> <p>The Amazon Polly service provides API operations for synthesizing high-quality speech from plain text and Speech Synthesis Markup Language (SSML), along with managing pronunciations lexicons that enable you to get the best results for your application domain.</p>', 'operations' => [ 'DeleteLexicon' => '<p>Deletes the specified pronunciation lexicon stored in an Amazon Web Services Region. A lexicon which has been deleted is not available for speech synthesis, nor is it possible to retrieve it using either the <code>GetLexicon</code> or <code>ListLexicon</code> APIs.</p> <p>For more information, see <a href="https://docs.aws.amazon.com/polly/latest/dg/managing-lexicons.html">Managing Lexicons</a>.</p>', 'DescribeVoices' => '<p>Returns the list of voices that are available for use when requesting speech synthesis. Each voice speaks a specified language, is either male or female, and is identified by an ID, which is the ASCII version of the voice name. </p> <p>When synthesizing speech ( <code>SynthesizeSpeech</code> ), you provide the voice ID for the voice you want from the list of voices returned by <code>DescribeVoices</code>.</p> <p>For example, you want your news reader application to read news in a specific language, but giving a user the option to choose the voice. Using the <code>DescribeVoices</code> operation you can provide the user with a list of available voices to select from.</p> <p> You can optionally specify a language code to filter the available voices. For example, if you specify <code>en-US</code>, the operation returns a list of all available US English voices. </p> <p>This operation requires permissions to perform the <code>polly:DescribeVoices</code> action.</p>', 'GetLexicon' => '<p>Returns the content of the specified pronunciation lexicon stored in an Amazon Web Services Region. For more information, see <a href="https://docs.aws.amazon.com/polly/latest/dg/managing-lexicons.html">Managing Lexicons</a>.</p>', 'GetSpeechSynthesisTask' => '<p>Retrieves a specific SpeechSynthesisTask object based on its TaskID. This object contains information about the given speech synthesis task, including the status of the task, and a link to the S3 bucket containing the output of the task.</p>', 'ListLexicons' => '<p>Returns a list of pronunciation lexicons stored in an Amazon Web Services Region. For more information, see <a href="https://docs.aws.amazon.com/polly/latest/dg/managing-lexicons.html">Managing Lexicons</a>.</p>', 'ListSpeechSynthesisTasks' => '<p>Returns a list of SpeechSynthesisTask objects ordered by their creation date. This operation can filter the tasks by their status, for example, allowing users to list only tasks that are completed.</p>', 'PutLexicon' => '<p>Stores a pronunciation lexicon in an Amazon Web Services Region. If a lexicon with the same name already exists in the region, it is overwritten by the new lexicon. Lexicon operations have eventual consistency, therefore, it might take some time before the lexicon is available to the SynthesizeSpeech operation.</p> <p>For more information, see <a href="https://docs.aws.amazon.com/polly/latest/dg/managing-lexicons.html">Managing Lexicons</a>.</p>', 'StartSpeechSynthesisTask' => '<p>Allows the creation of an asynchronous synthesis task, by starting a new <code>SpeechSynthesisTask</code>. This operation requires all the standard information needed for speech synthesis, plus the name of an Amazon S3 bucket for the service to store the output of the synthesis task and two optional parameters (<code>OutputS3KeyPrefix</code> and <code>SnsTopicArn</code>). Once the synthesis task is created, this operation will return a <code>SpeechSynthesisTask</code> object, which will include an identifier of this task as well as the current status. The <code>SpeechSynthesisTask</code> object is available for 72 hours after starting the asynchronous synthesis task.</p>', 'SynthesizeSpeech' => '<p>Synthesizes UTF-8 input, plain text or SSML, to a stream of bytes. SSML input must be valid, well-formed SSML. Some alphabets might not be available with all the voices (for example, Cyrillic might not be read at all by English voices) unless phoneme mapping is used. For more information, see <a href="https://docs.aws.amazon.com/polly/latest/dg/how-text-to-speech-works.html">How it Works</a>.</p>', ], 'shapes' => [ 'Alphabet' => [ 'base' => NULL, 'refs' => [ 'LexiconAttributes$Alphabet' => '<p>Phonetic alphabet used in the lexicon. Valid values are <code>ipa</code> and <code>x-sampa</code>.</p>', ], ], 'AudioStream' => [ 'base' => NULL, 'refs' => [ 'SynthesizeSpeechOutput$AudioStream' => '<p> Stream containing the synthesized speech. </p>', ], ], 'ContentType' => [ 'base' => NULL, 'refs' => [ 'SynthesizeSpeechOutput$ContentType' => '<p> Specifies the type audio stream. This should reflect the <code>OutputFormat</code> parameter in your request. </p> <ul> <li> <p> If you request <code>mp3</code> as the <code>OutputFormat</code>, the <code>ContentType</code> returned is audio/mpeg. </p> </li> <li> <p> If you request <code>ogg_vorbis</code> as the <code>OutputFormat</code>, the <code>ContentType</code> returned is audio/ogg. </p> </li> <li> <p> If you request <code>pcm</code> as the <code>OutputFormat</code>, the <code>ContentType</code> returned is audio/pcm in a signed 16-bit, 1 channel (mono), little-endian format. </p> </li> <li> <p>If you request <code>json</code> as the <code>OutputFormat</code>, the <code>ContentType</code> returned is audio/json.</p> </li> </ul> <p> </p>', ], ], 'DateTime' => [ 'base' => NULL, 'refs' => [ 'SynthesisTask$CreationTime' => '<p>Timestamp for the time the synthesis task was started.</p>', ], ], 'DeleteLexiconInput' => [ 'base' => NULL, 'refs' => [], ], 'DeleteLexiconOutput' => [ 'base' => NULL, 'refs' => [], ], 'DescribeVoicesInput' => [ 'base' => NULL, 'refs' => [], ], 'DescribeVoicesOutput' => [ 'base' => NULL, 'refs' => [], ], 'Engine' => [ 'base' => NULL, 'refs' => [ 'DescribeVoicesInput$Engine' => '<p>Specifies the engine (<code>standard</code> or <code>neural</code>) used by Amazon Polly when processing input text for speech synthesis. </p>', 'EngineList$member' => NULL, 'StartSpeechSynthesisTaskInput$Engine' => '<p>Specifies the engine (<code>standard</code> or <code>neural</code>) for Amazon Polly to use when processing input text for speech synthesis. Using a voice that is not supported for the engine selected will result in an error.</p>', 'SynthesisTask$Engine' => '<p>Specifies the engine (<code>standard</code> or <code>neural</code>) for Amazon Polly to use when processing input text for speech synthesis. Using a voice that is not supported for the engine selected will result in an error.</p>', 'SynthesizeSpeechInput$Engine' => '<p>Specifies the engine (<code>standard</code> or <code>neural</code>) for Amazon Polly to use when processing input text for speech synthesis. For information on Amazon Polly voices and which voices are available in standard-only, NTTS-only, and both standard and NTTS formats, see <a href="https://docs.aws.amazon.com/polly/latest/dg/voicelist.html">Available Voices</a>.</p> <p> <b>NTTS-only voices</b> </p> <p>When using NTTS-only voices such as Kevin (en-US), this parameter is required and must be set to <code>neural</code>. If the engine is not specified, or is set to <code>standard</code>, this will result in an error. </p> <p>Type: String</p> <p>Valid Values: <code>standard</code> | <code>neural</code> </p> <p>Required: Yes</p> <p> <b>Standard voices</b> </p> <p>For standard voices, this is not required; the engine parameter defaults to <code>standard</code>. If the engine is not specified, or is set to <code>standard</code> and an NTTS-only voice is selected, this will result in an error. </p>', ], ], 'EngineList' => [ 'base' => NULL, 'refs' => [ 'Voice$SupportedEngines' => '<p>Specifies which engines (<code>standard</code> or <code>neural</code>) that are supported by a given voice.</p>', ], ], 'EngineNotSupportedException' => [ 'base' => '<p>This engine is not compatible with the voice that you have designated. Choose a new voice that is compatible with the engine or change the engine and restart the operation.</p>', 'refs' => [], ], 'ErrorMessage' => [ 'base' => NULL, 'refs' => [ 'EngineNotSupportedException$message' => NULL, 'InvalidLexiconException$message' => NULL, 'InvalidNextTokenException$message' => NULL, 'InvalidS3BucketException$message' => NULL, 'InvalidS3KeyException$message' => NULL, 'InvalidSampleRateException$message' => NULL, 'InvalidSnsTopicArnException$message' => NULL, 'InvalidSsmlException$message' => NULL, 'InvalidTaskIdException$message' => NULL, 'LanguageNotSupportedException$message' => NULL, 'LexiconNotFoundException$message' => NULL, 'LexiconSizeExceededException$message' => NULL, 'MarksNotSupportedForFormatException$message' => NULL, 'MaxLexemeLengthExceededException$message' => NULL, 'MaxLexiconsNumberExceededException$message' => NULL, 'ServiceFailureException$message' => NULL, 'SsmlMarksNotSupportedForTextTypeException$message' => NULL, 'SynthesisTaskNotFoundException$message' => NULL, 'TextLengthExceededException$message' => NULL, 'UnsupportedPlsAlphabetException$message' => NULL, 'UnsupportedPlsLanguageException$message' => NULL, ], ], 'Gender' => [ 'base' => NULL, 'refs' => [ 'Voice$Gender' => '<p>Gender of the voice.</p>', ], ], 'GetLexiconInput' => [ 'base' => NULL, 'refs' => [], ], 'GetLexiconOutput' => [ 'base' => NULL, 'refs' => [], ], 'GetSpeechSynthesisTaskInput' => [ 'base' => NULL, 'refs' => [], ], 'GetSpeechSynthesisTaskOutput' => [ 'base' => NULL, 'refs' => [], ], 'IncludeAdditionalLanguageCodes' => [ 'base' => NULL, 'refs' => [ 'DescribeVoicesInput$IncludeAdditionalLanguageCodes' => '<p>Boolean value indicating whether to return any bilingual voices that use the specified language as an additional language. For instance, if you request all languages that use US English (es-US), and there is an Italian voice that speaks both Italian (it-IT) and US English, that voice will be included if you specify <code>yes</code> but not if you specify <code>no</code>.</p>', ], ], 'InvalidLexiconException' => [ 'base' => '<p>Amazon Polly can\'t find the specified lexicon. Verify that the lexicon\'s name is spelled correctly, and then try again.</p>', 'refs' => [], ], 'InvalidNextTokenException' => [ 'base' => '<p>The NextToken is invalid. Verify that it\'s spelled correctly, and then try again.</p>', 'refs' => [], ], 'InvalidS3BucketException' => [ 'base' => '<p>The provided Amazon S3 bucket name is invalid. Please check your input with S3 bucket naming requirements and try again.</p>', 'refs' => [], ], 'InvalidS3KeyException' => [ 'base' => '<p>The provided Amazon S3 key prefix is invalid. Please provide a valid S3 object key name.</p>', 'refs' => [], ], 'InvalidSampleRateException' => [ 'base' => '<p>The specified sample rate is not valid.</p>', 'refs' => [], ], 'InvalidSnsTopicArnException' => [ 'base' => '<p>The provided SNS topic ARN is invalid. Please provide a valid SNS topic ARN and try again.</p>', 'refs' => [], ], 'InvalidSsmlException' => [ 'base' => '<p>The SSML you provided is invalid. Verify the SSML syntax, spelling of tags and values, and then try again.</p>', 'refs' => [], ], 'InvalidTaskIdException' => [ 'base' => '<p>The provided Task ID is not valid. Please provide a valid Task ID and try again.</p>', 'refs' => [], ], 'LanguageCode' => [ 'base' => NULL, 'refs' => [ 'DescribeVoicesInput$LanguageCode' => '<p> The language identification tag (ISO 639 code for the language name-ISO 3166 country code) for filtering the list of voices returned. If you don\'t specify this optional parameter, all available voices are returned. </p>', 'LanguageCodeList$member' => NULL, 'LexiconAttributes$LanguageCode' => '<p>Language code that the lexicon applies to. A lexicon with a language code such as "en" would be applied to all English languages (en-GB, en-US, en-AUS, en-WLS, and so on.</p>', 'StartSpeechSynthesisTaskInput$LanguageCode' => '<p>Optional language code for the Speech Synthesis request. This is only necessary if using a bilingual voice, such as Aditi, which can be used for either Indian English (en-IN) or Hindi (hi-IN). </p> <p>If a bilingual voice is used and no language code is specified, Amazon Polly uses the default language of the bilingual voice. The default language for any voice is the one returned by the <a href="https://docs.aws.amazon.com/polly/latest/dg/API_DescribeVoices.html">DescribeVoices</a> operation for the <code>LanguageCode</code> parameter. For example, if no language code is specified, Aditi will use Indian English rather than Hindi.</p>', 'SynthesisTask$LanguageCode' => '<p>Optional language code for a synthesis task. This is only necessary if using a bilingual voice, such as Aditi, which can be used for either Indian English (en-IN) or Hindi (hi-IN). </p> <p>If a bilingual voice is used and no language code is specified, Amazon Polly uses the default language of the bilingual voice. The default language for any voice is the one returned by the <a href="https://docs.aws.amazon.com/polly/latest/dg/API_DescribeVoices.html">DescribeVoices</a> operation for the <code>LanguageCode</code> parameter. For example, if no language code is specified, Aditi will use Indian English rather than Hindi.</p>', 'SynthesizeSpeechInput$LanguageCode' => '<p>Optional language code for the Synthesize Speech request. This is only necessary if using a bilingual voice, such as Aditi, which can be used for either Indian English (en-IN) or Hindi (hi-IN). </p> <p>If a bilingual voice is used and no language code is specified, Amazon Polly uses the default language of the bilingual voice. The default language for any voice is the one returned by the <a href="https://docs.aws.amazon.com/polly/latest/dg/API_DescribeVoices.html">DescribeVoices</a> operation for the <code>LanguageCode</code> parameter. For example, if no language code is specified, Aditi will use Indian English rather than Hindi.</p>', 'Voice$LanguageCode' => '<p>Language code of the voice.</p>', ], ], 'LanguageCodeList' => [ 'base' => NULL, 'refs' => [ 'Voice$AdditionalLanguageCodes' => '<p>Additional codes for languages available for the specified voice in addition to its default language. </p> <p>For example, the default language for Aditi is Indian English (en-IN) because it was first used for that language. Since Aditi is bilingual and fluent in both Indian English and Hindi, this parameter would show the code <code>hi-IN</code>.</p>', ], ], 'LanguageName' => [ 'base' => NULL, 'refs' => [ 'Voice$LanguageName' => '<p>Human readable name of the language in English.</p>', ], ], 'LanguageNotSupportedException' => [ 'base' => '<p>The language specified is not currently supported by Amazon Polly in this capacity.</p>', 'refs' => [], ], 'LastModified' => [ 'base' => NULL, 'refs' => [ 'LexiconAttributes$LastModified' => '<p>Date lexicon was last modified (a timestamp value).</p>', ], ], 'LexemesCount' => [ 'base' => NULL, 'refs' => [ 'LexiconAttributes$LexemesCount' => '<p>Number of lexemes in the lexicon.</p>', ], ], 'Lexicon' => [ 'base' => '<p>Provides lexicon name and lexicon content in string format. For more information, see <a href="https://www.w3.org/TR/pronunciation-lexicon/">Pronunciation Lexicon Specification (PLS) Version 1.0</a>.</p>', 'refs' => [ 'GetLexiconOutput$Lexicon' => '<p>Lexicon object that provides name and the string content of the lexicon. </p>', ], ], 'LexiconArn' => [ 'base' => NULL, 'refs' => [ 'LexiconAttributes$LexiconArn' => '<p>Amazon Resource Name (ARN) of the lexicon.</p>', ], ], 'LexiconAttributes' => [ 'base' => '<p>Contains metadata describing the lexicon such as the number of lexemes, language code, and so on. For more information, see <a href="https://docs.aws.amazon.com/polly/latest/dg/managing-lexicons.html">Managing Lexicons</a>.</p>', 'refs' => [ 'GetLexiconOutput$LexiconAttributes' => '<p>Metadata of the lexicon, including phonetic alphabetic used, language code, lexicon ARN, number of lexemes defined in the lexicon, and size of lexicon in bytes.</p>', 'LexiconDescription$Attributes' => '<p>Provides lexicon metadata.</p>', ], ], 'LexiconContent' => [ 'base' => NULL, 'refs' => [ 'Lexicon$Content' => '<p>Lexicon content in string format. The content of a lexicon must be in PLS format.</p>', 'PutLexiconInput$Content' => '<p>Content of the PLS lexicon as string data.</p>', ], ], 'LexiconDescription' => [ 'base' => '<p>Describes the content of the lexicon.</p>', 'refs' => [ 'LexiconDescriptionList$member' => NULL, ], ], 'LexiconDescriptionList' => [ 'base' => NULL, 'refs' => [ 'ListLexiconsOutput$Lexicons' => '<p>A list of lexicon names and attributes.</p>', ], ], 'LexiconName' => [ 'base' => NULL, 'refs' => [ 'DeleteLexiconInput$Name' => '<p>The name of the lexicon to delete. Must be an existing lexicon in the region.</p>', 'GetLexiconInput$Name' => '<p>Name of the lexicon.</p>', 'Lexicon$Name' => '<p>Name of the lexicon.</p>', 'LexiconDescription$Name' => '<p>Name of the lexicon.</p>', 'LexiconNameList$member' => NULL, 'PutLexiconInput$Name' => '<p>Name of the lexicon. The name must follow the regular express format [0-9A-Za-z]{1,20}. That is, the name is a case-sensitive alphanumeric string up to 20 characters long. </p>', ], ], 'LexiconNameList' => [ 'base' => NULL, 'refs' => [ 'StartSpeechSynthesisTaskInput$LexiconNames' => '<p>List of one or more pronunciation lexicon names you want the service to apply during synthesis. Lexicons are applied only if the language of the lexicon is the same as the language of the voice. </p>', 'SynthesisTask$LexiconNames' => '<p>List of one or more pronunciation lexicon names you want the service to apply during synthesis. Lexicons are applied only if the language of the lexicon is the same as the language of the voice. </p>', 'SynthesizeSpeechInput$LexiconNames' => '<p>List of one or more pronunciation lexicon names you want the service to apply during synthesis. Lexicons are applied only if the language of the lexicon is the same as the language of the voice. For information about storing lexicons, see <a href="https://docs.aws.amazon.com/polly/latest/dg/API_PutLexicon.html">PutLexicon</a>.</p>', ], ], 'LexiconNotFoundException' => [ 'base' => '<p>Amazon Polly can\'t find the specified lexicon. This could be caused by a lexicon that is missing, its name is misspelled or specifying a lexicon that is in a different region.</p> <p>Verify that the lexicon exists, is in the region (see <a>ListLexicons</a>) and that you spelled its name is spelled correctly. Then try again.</p>', 'refs' => [], ], 'LexiconSizeExceededException' => [ 'base' => '<p>The maximum size of the specified lexicon would be exceeded by this operation.</p>', 'refs' => [], ], 'ListLexiconsInput' => [ 'base' => NULL, 'refs' => [], ], 'ListLexiconsOutput' => [ 'base' => NULL, 'refs' => [], ], 'ListSpeechSynthesisTasksInput' => [ 'base' => NULL, 'refs' => [], ], 'ListSpeechSynthesisTasksOutput' => [ 'base' => NULL, 'refs' => [], ], 'MarksNotSupportedForFormatException' => [ 'base' => '<p>Speech marks are not supported for the <code>OutputFormat</code> selected. Speech marks are only available for content in <code>json</code> format.</p>', 'refs' => [], ], 'MaxLexemeLengthExceededException' => [ 'base' => '<p>The maximum size of the lexeme would be exceeded by this operation.</p>', 'refs' => [], ], 'MaxLexiconsNumberExceededException' => [ 'base' => '<p>The maximum number of lexicons would be exceeded by this operation.</p>', 'refs' => [], ], 'MaxResults' => [ 'base' => NULL, 'refs' => [ 'ListSpeechSynthesisTasksInput$MaxResults' => '<p>Maximum number of speech synthesis tasks returned in a List operation.</p>', ], ], 'NextToken' => [ 'base' => NULL, 'refs' => [ 'DescribeVoicesInput$NextToken' => '<p>An opaque pagination token returned from the previous <code>DescribeVoices</code> operation. If present, this indicates where to continue the listing.</p>', 'DescribeVoicesOutput$NextToken' => '<p>The pagination token to use in the next request to continue the listing of voices. <code>NextToken</code> is returned only if the response is truncated.</p>', 'ListLexiconsInput$NextToken' => '<p>An opaque pagination token returned from previous <code>ListLexicons</code> operation. If present, indicates where to continue the list of lexicons.</p>', 'ListLexiconsOutput$NextToken' => '<p>The pagination token to use in the next request to continue the listing of lexicons. <code>NextToken</code> is returned only if the response is truncated.</p>', 'ListSpeechSynthesisTasksInput$NextToken' => '<p>The pagination token to use in the next request to continue the listing of speech synthesis tasks. </p>', 'ListSpeechSynthesisTasksOutput$NextToken' => '<p>An opaque pagination token returned from the previous List operation in this request. If present, this indicates where to continue the listing.</p>', ], ], 'OutputFormat' => [ 'base' => NULL, 'refs' => [ 'StartSpeechSynthesisTaskInput$OutputFormat' => '<p>The format in which the returned output will be encoded. For audio stream, this will be mp3, ogg_vorbis, or pcm. For speech marks, this will be json. </p>', 'SynthesisTask$OutputFormat' => '<p>The format in which the returned output will be encoded. For audio stream, this will be mp3, ogg_vorbis, or pcm. For speech marks, this will be json. </p>', 'SynthesizeSpeechInput$OutputFormat' => '<p> The format in which the returned output will be encoded. For audio stream, this will be mp3, ogg_vorbis, or pcm. For speech marks, this will be json. </p> <p>When pcm is used, the content returned is audio/pcm in a signed 16-bit, 1 channel (mono), little-endian format. </p>', ], ], 'OutputS3BucketName' => [ 'base' => NULL, 'refs' => [ 'StartSpeechSynthesisTaskInput$OutputS3BucketName' => '<p>Amazon S3 bucket name to which the output file will be saved.</p>', ], ], 'OutputS3KeyPrefix' => [ 'base' => NULL, 'refs' => [ 'StartSpeechSynthesisTaskInput$OutputS3KeyPrefix' => '<p>The Amazon S3 key prefix for the output speech file.</p>', ], ], 'OutputUri' => [ 'base' => NULL, 'refs' => [ 'SynthesisTask$OutputUri' => '<p>Pathway for the output speech file.</p>', ], ], 'PutLexiconInput' => [ 'base' => NULL, 'refs' => [], ], 'PutLexiconOutput' => [ 'base' => NULL, 'refs' => [], ], 'RequestCharacters' => [ 'base' => NULL, 'refs' => [ 'SynthesisTask$RequestCharacters' => '<p>Number of billable characters synthesized.</p>', 'SynthesizeSpeechOutput$RequestCharacters' => '<p>Number of characters synthesized.</p>', ], ], 'SampleRate' => [ 'base' => NULL, 'refs' => [ 'StartSpeechSynthesisTaskInput$SampleRate' => '<p>The audio frequency specified in Hz.</p> <p>The valid values for mp3 and ogg_vorbis are "8000", "16000", "22050", and "24000". The default value for standard voices is "22050". The default value for neural voices is "24000".</p> <p>Valid values for pcm are "8000" and "16000" The default value is "16000". </p>', 'SynthesisTask$SampleRate' => '<p>The audio frequency specified in Hz.</p> <p>The valid values for mp3 and ogg_vorbis are "8000", "16000", "22050", and "24000". The default value for standard voices is "22050". The default value for neural voices is "24000".</p> <p>Valid values for pcm are "8000" and "16000" The default value is "16000". </p>', 'SynthesizeSpeechInput$SampleRate' => '<p>The audio frequency specified in Hz.</p> <p>The valid values for mp3 and ogg_vorbis are "8000", "16000", "22050", and "24000". The default value for standard voices is "22050". The default value for neural voices is "24000".</p> <p>Valid values for pcm are "8000" and "16000" The default value is "16000". </p>', ], ], 'ServiceFailureException' => [ 'base' => '<p>An unknown condition has caused a service failure.</p>', 'refs' => [], ], 'Size' => [ 'base' => NULL, 'refs' => [ 'LexiconAttributes$Size' => '<p>Total size of the lexicon, in characters.</p>', ], ], 'SnsTopicArn' => [ 'base' => NULL, 'refs' => [ 'StartSpeechSynthesisTaskInput$SnsTopicArn' => '<p>ARN for the SNS topic optionally used for providing status notification for a speech synthesis task.</p>', 'SynthesisTask$SnsTopicArn' => '<p>ARN for the SNS topic optionally used for providing status notification for a speech synthesis task.</p>', ], ], 'SpeechMarkType' => [ 'base' => NULL, 'refs' => [ 'SpeechMarkTypeList$member' => NULL, ], ], 'SpeechMarkTypeList' => [ 'base' => NULL, 'refs' => [ 'StartSpeechSynthesisTaskInput$SpeechMarkTypes' => '<p>The type of speech marks returned for the input text.</p>', 'SynthesisTask$SpeechMarkTypes' => '<p>The type of speech marks returned for the input text.</p>', 'SynthesizeSpeechInput$SpeechMarkTypes' => '<p>The type of speech marks returned for the input text.</p>', ], ], 'SsmlMarksNotSupportedForTextTypeException' => [ 'base' => '<p>SSML speech marks are not supported for plain text-type input.</p>', 'refs' => [], ], 'StartSpeechSynthesisTaskInput' => [ 'base' => NULL, 'refs' => [], ], 'StartSpeechSynthesisTaskOutput' => [ 'base' => NULL, 'refs' => [], ], 'SynthesisTask' => [ 'base' => '<p>SynthesisTask object that provides information about a speech synthesis task.</p>', 'refs' => [ 'GetSpeechSynthesisTaskOutput$SynthesisTask' => '<p>SynthesisTask object that provides information from the requested task, including output format, creation time, task status, and so on.</p>', 'StartSpeechSynthesisTaskOutput$SynthesisTask' => '<p>SynthesisTask object that provides information and attributes about a newly submitted speech synthesis task.</p>', 'SynthesisTasks$member' => NULL, ], ], 'SynthesisTaskNotFoundException' => [ 'base' => '<p>The Speech Synthesis task with requested Task ID cannot be found.</p>', 'refs' => [], ], 'SynthesisTasks' => [ 'base' => NULL, 'refs' => [ 'ListSpeechSynthesisTasksOutput$SynthesisTasks' => '<p>List of SynthesisTask objects that provides information from the specified task in the list request, including output format, creation time, task status, and so on.</p>', ], ], 'SynthesizeSpeechInput' => [ 'base' => NULL, 'refs' => [], ], 'SynthesizeSpeechOutput' => [ 'base' => NULL, 'refs' => [], ], 'TaskId' => [ 'base' => NULL, 'refs' => [ 'GetSpeechSynthesisTaskInput$TaskId' => '<p>The Amazon Polly generated identifier for a speech synthesis task.</p>', 'SynthesisTask$TaskId' => '<p>The Amazon Polly generated identifier for a speech synthesis task.</p>', ], ], 'TaskStatus' => [ 'base' => NULL, 'refs' => [ 'ListSpeechSynthesisTasksInput$Status' => '<p>Status of the speech synthesis tasks returned in a List operation</p>', 'SynthesisTask$TaskStatus' => '<p>Current status of the individual speech synthesis task.</p>', ], ], 'TaskStatusReason' => [ 'base' => NULL, 'refs' => [ 'SynthesisTask$TaskStatusReason' => '<p>Reason for the current status of a specific speech synthesis task, including errors if the task has failed.</p>', ], ], 'Text' => [ 'base' => NULL, 'refs' => [ 'StartSpeechSynthesisTaskInput$Text' => '<p>The input text to synthesize. If you specify ssml as the TextType, follow the SSML format for the input text. </p>', 'SynthesizeSpeechInput$Text' => '<p> Input text to synthesize. If you specify <code>ssml</code> as the <code>TextType</code>, follow the SSML format for the input text. </p>', ], ], 'TextLengthExceededException' => [ 'base' => '<p>The value of the "Text" parameter is longer than the accepted limits. For the <code>SynthesizeSpeech</code> API, the limit for input text is a maximum of 6000 characters total, of which no more than 3000 can be billed characters. For the <code>StartSpeechSynthesisTask</code> API, the maximum is 200,000 characters, of which no more than 100,000 can be billed characters. SSML tags are not counted as billed characters.</p>', 'refs' => [], ], 'TextType' => [ 'base' => NULL, 'refs' => [ 'StartSpeechSynthesisTaskInput$TextType' => '<p>Specifies whether the input text is plain text or SSML. The default value is plain text. </p>', 'SynthesisTask$TextType' => '<p>Specifies whether the input text is plain text or SSML. The default value is plain text. </p>', 'SynthesizeSpeechInput$TextType' => '<p> Specifies whether the input text is plain text or SSML. The default value is plain text. For more information, see <a href="https://docs.aws.amazon.com/polly/latest/dg/ssml.html">Using SSML</a>.</p>', ], ], 'UnsupportedPlsAlphabetException' => [ 'base' => '<p>The alphabet specified by the lexicon is not a supported alphabet. Valid values are <code>x-sampa</code> and <code>ipa</code>.</p>', 'refs' => [], ], 'UnsupportedPlsLanguageException' => [ 'base' => '<p>The language specified in the lexicon is unsupported. For a list of supported languages, see <a href="https://docs.aws.amazon.com/polly/latest/dg/API_LexiconAttributes.html">Lexicon Attributes</a>.</p>', 'refs' => [], ], 'Voice' => [ 'base' => '<p>Description of the voice.</p>', 'refs' => [ 'VoiceList$member' => NULL, ], ], 'VoiceId' => [ 'base' => NULL, 'refs' => [ 'StartSpeechSynthesisTaskInput$VoiceId' => '<p>Voice ID to use for the synthesis. </p>', 'SynthesisTask$VoiceId' => '<p>Voice ID to use for the synthesis. </p>', 'SynthesizeSpeechInput$VoiceId' => '<p> Voice ID to use for the synthesis. You can get a list of available voice IDs by calling the <a href="https://docs.aws.amazon.com/polly/latest/dg/API_DescribeVoices.html">DescribeVoices</a> operation. </p>', 'Voice$Id' => '<p>Amazon Polly assigned voice ID. This is the ID that you specify when calling the <code>SynthesizeSpeech</code> operation.</p>', ], ], 'VoiceList' => [ 'base' => NULL, 'refs' => [ 'DescribeVoicesOutput$Voices' => '<p>A list of voices with their properties.</p>', ], ], 'VoiceName' => [ 'base' => NULL, 'refs' => [ 'Voice$Name' => '<p>Name of the voice (for example, Salli, Kendra, etc.). This provides a human readable voice name that you might display in your application.</p>', ], ], ],];
