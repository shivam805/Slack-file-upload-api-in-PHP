<?php

          public function slackreport($filename){
 
            $postFields = array();
            $target_path = $filename;
     
            $fh = fopen($target_path, 'rw');
            $csv = stream_get_contents($fh);
            $postFields['content'] = $csv;

            $postFields['filename'] = $filename;
            $postFields['token'] = "";

            $postFields['channels'] = "order-report";
            $postFields['pretty'] = "1";
            $postFields['username'] = "";
            print_r($postFields);
            
            $curl_handle = curl_init("https://slack.com/api/files.upload");
            $headers = array("Content-Type:multipart/form-data"); 
            //curl_setopt($curl_handle, CURLOPT_URL, $base_url);
            curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl_handle, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl_handle, CURLOPT_POST, true);
            curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $postFields);
            
            //execute the API Call
            $returned_data = curl_exec($curl_handle);
            echo "<pre>".$returned_data; 

        }

	

}
