<?php
use App\Content;
return  [
        'topbar_email'=>Content::where(['page'=>'contact','content_id'=>3])->pluck("content")->first(),
        'topbar_address'=>Content::where(['page'=>'contact','content_id'=>4])->pluck("content")->first(),
        'topbar_phone'=>Content::where(['page'=>'contact','content_id'=>2])->pluck("content")->first(),
    ];
