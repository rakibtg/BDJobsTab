<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Havent i made it obvious!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
<div class="jobs">
    <?php

    if ( ! file_exists( './date.db' ) ) file_put_contents( './date.db', time() );

    $oldDate = file_get_contents( './date.db' );

    if ( ( time() - $oldDate ) >= 3600 || ! file_exists( './jobs.db' ) ) {
        $content = shell_exec('curl "http://jobs.bdjobs.com/Joblisting_common_init.asp?fcatId=8&locationId=&iCat=0&JobType=0&JobLevel=0&JobPosting=1&JobDeadline=0&JobKeyword=&ListOrder=%27%27&Exp=0&Age=0&Gender=&GenderB=&MDate=&ver=&OrgType=0&news=0&SpecialSkill=&RetiredArmy=" -H "Origin: http://jobs.bdjobs.com" -H "Accept-Encoding: gzip, deflate" -H "Accept-Language: en-US,en;q=0.9" -H "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36" -H "Content-Type: text/plain;charset=UTF-8" -H "Accept: */*" -H "Referer: http://jobs.bdjobs.com/jobsearch.asp?fcatId=8&icatId=" -H "Cookie: _ga=GA1.2.1829340376.1516012475; __gads=ID=5afad3ebe7e251e1:T=1516012474:S=ALNI_MbCJkRR2qLeGZ9O6-Fwz0RvlSnoKA; __qca=P0-1922353494-1518243464935; __utmz=102520602.1518245842.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); _cbx_ref.1.aee8=%5B%22%22%2C%22%22%2C1518247308%2C%22http%3A%2F%2Fwww.bdjobs.com%2F%22%5D; _cbx_id.1.aee8=25f384c557e83a50.1518243487.2.1518247794.1518247308.; MybdjobsLoggedIn=0; MybdjobsSCodeSeeker=; MybdjobsUserId=; __utmc=64765948; _gid=GA1.2.919370758.1518588866; EM=; CV=; TR=; JM=; ASPSESSIONIDQCRRQSBR=NAJGADHBEGFCEAIAHAJAIJKG; linkedin_oauth_81w4aupl7jopgl_crc=null; OX_plg=pm; __utmc=102520602; __utma=64765948.1829340376.1516012475.1518588863.1518592757.4; __utmz=64765948.1518592757.4.2.utmcsr=jobs.bdjobs.com|utmccn=(referral)|utmcmd=referral|utmcct=/jobsearch.asp; __utmb=64765948.3.9.1518592757; __utma=102520602.1829340376.1516012475.1518588886.1518592766.4; OX_sd=2; __utmb=102520602.2.10.1518592766; JOBSBRWWIDTH=1366; JOBSRPP=40" -H "Connection: keep-alive" --data-binary $"Joblisting_common_init.asp?fcatId=8&locationId=&iCat=0&JobType=0&JobLevel=0&JobPosting=1&JobDeadline=0&JobKeyword=&ListOrder=\"\"&Exp=0&Age=0&Gender=&GenderB=&MDate=&ver=&OrgType=0&news=0&SpecialSkill=&RetiredArmy=" --compressed');
        file_put_contents( './jobs.db', $content );
        echo '<div class="_____C"><strong>Cache Refreshed</strong></div>';
        file_put_contents( './date.db', time() );
    } else {
        echo '<div class="_____C"><strong>Cache Jobs Used</strong></div>';
    }

    echo file_get_contents( './jobs.db' );

    ?>
</div>
<script src="./main.js"></script>
</body>
</html>