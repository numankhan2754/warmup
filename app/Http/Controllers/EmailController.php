<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webklex\IMAP\Client;
use Webklex\IMAP\ClientManager;

class EmailController extends Controller
{
    public function fetchEmails()
    {
        // Get IMAP settings from the configuration
        $settings = config('imap.default');

        // Create an IMAP client using the settings
        $client = new Client($settings);

        try {
            // Connect to the IMAP server
            $client->connect();

            // Get all Mailboxes
            $folders = $client->getFolders();

            // Loop through every Mailbox
            foreach($folders as $folder){
                // Get all Messages of the current Mailbox $folder
                $messages = $folder->messages()->all()->get();

                foreach($messages as $message){
                    echo $message->getSubject().'<br />';
                    echo 'Attachments: '.$message->getAttachments()->count().'<br />';
                    echo $message->getHTMLBody();

                    // Move the current Message to 'INBOX.read'
                    if($message->move('INBOX.read') == true){
                        echo 'Message has been moved';
                    }else{
                        echo 'Message could not be moved';
                    }
                }
            }

            // Disconnect from the IMAP server
            $client->disconnect();
        } catch (\Exception $e) {
            // Handle connection or other exceptions
            return $e->getMessage();
        }

        return "Emails fetched successfully!";
    }
}
