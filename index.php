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
<div class="wallpaper" style="
    background: url(https://source.unsplash.com/1600x900/?nature) no-repeat center center fixed;
    background-size: cover;    
"></div>
<div class="jobs">
    <?php

    if ( ! file_exists( './date.db' ) ) file_put_contents( './date.db', time() );

    $oldDate = file_get_contents( './date.db' );

    if ( ( time() - $oldDate ) >= 3600 || ! file_exists( './jobs.db' ) ) {
        $content = shell_exec('curl "http://jobs.bdjobs.com/Joblisting_common_init.asp?fcatId=8&locationId=&iCat=0&JobType=0&JobLevel=0&JobPosting=0&JobDeadline=0&JobKeyword=&ListOrder=%27%27&Exp=0&Age=0&Gender=&GenderB=&MDate=&ver=&OrgType=0&news=0&SpecialSkill=&RetiredArmy=" -H "Origin: http://jobs.bdjobs.com" -H "Accept-Encoding: gzip, deflate" -H "Accept-Language: en-US,en;q=0.9" -H "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36" -H "Content-Type: text/plain;charset=UTF-8" -H "Accept: */*" -H "Referer: http://jobs.bdjobs.com/jobsearch.asp?fcatId=8&icatId=" -H "Cookie: _ga=GA1.2.1829340376.1516012475; __gads=ID=5afad3ebe7e251e1:T=1516012474:S=ALNI_MbCJkRR2qLeGZ9O6-Fwz0RvlSnoKA; __qca=P0-1922353494-1518243464935; __utmz=102520602.1518245842.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); __utmz=64765948.1518592757.4.2.utmcsr=jobs.bdjobs.com|utmccn=(referral)|utmcmd=referral|utmcct=/jobsearch.asp; EM=; CV=; TR=; JM=; ASPSESSIONIDSCQQRQAQ=OIBGFEHANLNBEFLCOPMEPPIH; linkedin_oauth_81w4aupl7jopgl_crc=null; MybdjobsLoggedIn=0; MybdjobsSCodeSeeker=; MybdjobsUserId=; __utma=64765948.1829340376.1516012475.1518592757.1519026219.5; __utmc=64765948; __utmt=1; __utmb=64765948.4.8.1519026220040; _gid=GA1.2.257106583.1519026224; ASPSESSIONIDACQQTSDT=OFMOLPDBCGLGKJLLDJEOIDCB; OX_plg=pm; _cbx_ref.1.aee8=%5B%22%22%2C%22%22%2C1519026257%2C%22http%3A%2F%2Fwww.bdjobs.com%2F%22%5D; _cbx_ses.1.aee8=*; __utma=102520602.1829340376.1516012475.1518592766.1519026257.5; __utmc=102520602; OX_sd=2; _cbx_id.1.aee8=25f384c557e83a50.1518243487.3.1519026265.1519026257.; __utmb=102520602.3.10.1519026257; JOBSBRWWIDTH=1125; JOBSRPP=40" -H "Connection: keep-alive" --data-binary $"Joblisting_common_init.asp?fcatId=8&locationId=&iCat=0&JobType=0&JobLevel=0&JobPosting=0&JobDeadline=0&JobKeyword=&ListOrder=\"\"&Exp=0&Age=0&Gender=&GenderB=&MDate=&ver=&OrgType=0&news=0&SpecialSkill=&RetiredArmy=" --compressed');
        file_put_contents( './jobs.db', $content );
        echo '<div class="_____C"><strong>Cache refreshed</strong></div>';
        file_put_contents( './date.db', time() );
    } else {
        echo '<div class="_____C"><strong>Showing cached data</strong></div>';
    }

    echo file_get_contents( './jobs.db' );

    ?>
</div>
<script src="./main.js"></script>
</body>
</html>