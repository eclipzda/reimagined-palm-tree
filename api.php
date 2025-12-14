<?php
header('Content-Type: application/json; charset=utf-8');
if(!empty($_GET['m'])){

    switch ($_GET['m']) {
        case 'top':
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.uniswap.org/v1/graphql",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => '{
                    "operationName": "TopTokens100",
                    "variables": {
                        "duration": "DAY",
                        "chain": "ETHEREUM"
                    },
                    "query": "query TopTokens100($duration: HistoryDuration!, $chain: Chain!) {  topTokens(pageSize: 100, page: 1, chain: $chain, orderBy: VOLUME) {    id    name    chain    address    symbol    standard    market(currency: USD) {      id      totalValueLocked {        id        value        currency        __typename      }      price {        id        value        currency        __typename      }      pricePercentChange(duration: $duration) {        id        currency        value        __typename      }      volume(duration: $duration) {        id        value        currency        __typename      }      __typename    }    project {      id      logoUrl      __typename    }    __typename  }}"
                }',
                CURLOPT_HTTPHEADER => [
                    "Content-Type: application/json",
                    "origin: https://app.uniswap.org",
                    "referer: https://app.uniswap.org/",
                    'sec-ch-ua: "Chromium";v=\"112", "Google Chrome";v="112", "Not:A-Brand";v="99"',
                    "sec-ch-ua-mobile: ?0",
                    'sec-ch-ua-platform: "Windows"',
                    "sec-fetch-dest: empty",
                    "sec-fetch-mode: cors",
                    "sec-fetch-site: same-site",
                    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36"
                ],
            ]);
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                echo $err;
            } else {
                echo $response;
            }
            break;
        case 'nft': 
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.uniswap.org/v1/graphql",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => '{
                    "operationName": "TrendingCollections",
                    "variables": {
                      "size": 100,
                      "timePeriod": "DAY"
                    },
                    "query": "query TrendingCollections($size: Int, $timePeriod: HistoryDuration) {  topCollections(first: $size, duration: $timePeriod) {    edges {      node {        name        nftContracts {          address          totalSupply          __typename        }        image {          url          __typename        }        bannerImage {          url          __typename        }        isVerified        markets(currencies: ETH) {          floorPrice {            value            __typename          }          owners          totalVolume {            value            __typename          }          volume(duration: $timePeriod) {            value            __typename          }          volumePercentChange(duration: $timePeriod) {            value            __typename          }          floorPricePercentChange(duration: $timePeriod) {            value            __typename          }          sales {            value            __typename          }          listings {            value            __typename          }          __typename        }        __typename      }      __typename    }    __typename  }}"
                  }',
                CURLOPT_HTTPHEADER => [
                    "Content-Type: application/json",
                    "origin: https://app.uniswap.org",
                    "referer: https://app.uniswap.org/",
                    'sec-ch-ua: "Chromium";v=\"112", "Google Chrome";v="112", "Not:A-Brand";v="99"',
                    "sec-ch-ua-mobile: ?0",
                    'sec-ch-ua-platform: "Windows"',
                    "sec-fetch-dest: empty",
                    "sec-fetch-mode: cors",
                    "sec-fetch-site: same-site",
                    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36"
                ],
            ]);
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                echo $err;
            } else {
                echo $response;
            }
            break;

        default:
            echo "{}";
            break;
    }


}else{
    echo "{}";
}
    

