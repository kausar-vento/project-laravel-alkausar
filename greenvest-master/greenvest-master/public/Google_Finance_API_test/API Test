@php
                        $curl = curl_init();

                        curl_setopt_array($curl, [
                            CURLOPT_URL => 'https://google-finance4.p.rapidapi.com/ticker/?t=UNvR:IDX',
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 30,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => 'GET',
                            CURLOPT_HTTPHEADER => ['X-RapidAPI-Host: google-finance4.p.rapidapi.com', 'X-RapidAPI-Key: 1df20e6770msh83a29817c29639cp167a2djsn6b0821802305'],
                        ]);

                        $response = curl_exec($curl);
                        $err = curl_error($curl);

                        curl_close($curl);

                        if ($err) {
                            echo 'cURL Error #:' . $err;
                        } else {
                            /* echo $response; */
                            $test = json_decode($response, true);
                            /* echo "<pre>";
                                            print_r($test);
                                            echo "</pre>"; */

                            /* echo $test['charts']['1day'][0]['price']; */
                            $numItems = count($test['charts']['1month']);

                            foreach ($test['charts']['1month'] as $item) {
                                $time = strtotime($item['date']);
                                echo '"' . date('l, M d', $time) . '"' . ", ";
                                echo (int)$item['price'];
                                echo '; ';
                            }
                        }
@endphp
