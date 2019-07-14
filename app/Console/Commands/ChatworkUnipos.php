<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use wataridori\ChatworkSDK\ChatworkSDK;
use wataridori\ChatworkSDK\ChatworkRoom;

class ChatworkUnipos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chatwork:send-weekly-unipos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder for all member in ChimLon group';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        ChatworkSDK::setApiKey(env('CHATWORK_API_KEY'));
        $room = new ChatworkRoom(env('CHATWORK_CHIMLON_ID'));
        $room->sendMessage("[toall]\nMột tuần làm việc sắp hết. \nMọi người cố gắng sử dụng hết 400 điểm unipos nhé");
        // $room->sendMessage("[toall]\nRemind: Hôm nay chúng ta sẽ có buổi team building vào 18:30 tại BLACK STONE - Korean Stone BBQ, 52-56 Huỳnh Thúc Kháng.\nGoogle map: https://goo.gl/sSHHG1\nMọi người cố gắng hoàn thành công việc trước 17h nhé.");
    }
}
