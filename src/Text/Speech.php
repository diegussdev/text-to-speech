<?php

namespace App\Text;

use Google\Cloud\TextToSpeech\V1\AudioConfig;
use Google\Cloud\TextToSpeech\V1\AudioEncoding;
use Google\Cloud\TextToSpeech\V1\SynthesisInput;
use Google\Cloud\TextToSpeech\V1\TextToSpeechClient;
use Google\Cloud\TextToSpeech\V1\VoiceSelectionParams;

class Speech {
    /**
     * Return authenticated client
     *
     * @return TextToSpeechClient
     */
    public static function getClient(): TextToSpeechClient
    {
        return new TextToSpeechClient([
            'credentials' => __DIR__ . '/../../key.json'
        ]);
    }

    /**
     * Convert text to speech and save
     *
     * @param string $text
     * @param string $language
     * @param string $file
     * @return boolean
     */
    public static function run(string $text, string $language, string $file): bool
    {
        // Set text
        $input = new SynthesisInput();
        $input->setText($text);

        // Set language
        $voice = new VoiceSelectionParams();
        $voice->setLanguageCode($language);

        // Audio type
        $audioConfig = new AudioConfig();
        $audioConfig->setAudioEncoding(AudioEncoding::MP3);

        // Run
        $textToSpeechClient = self::getClient();
        $resp = $textToSpeechClient->synthesizeSpeech($input, $voice, $audioConfig);

        // Save audio file
        file_put_contents($file, $resp->getAudioContent());

        return true;
    }
}