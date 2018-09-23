<?php
namespace MopConApi2018\App\Http;

class ApiMiddleware extends Middleware
{
    private $tocName = 'public';
    private $sourceInfo = [];
    
    private function init()
    {
        $this->sourceInfo['googleSheet'] = [
            'code-of-conduct' => [
                'sheetKey' => '1ZF6mWynbUWIb234q5ydqpu9XolNE6CRGcwyLygGaTZ4',
                'sheetGridId' => '',
                'columns' => [
                    'title' => 'title',
                    'content' => 'content',
                    'en_title' => 'en-title',
                    'en_content' => 'en-content',
                ],
                'description' => '行動準則',
                'status' => 1,
            ],
            'schedule' => [
                'sheetKey' => '1ZF6mWynbUWIb234q5ydqpu9XolNE6CRGcwyLygGaTZ4',
                'sheetGridId' => 'oaz88cr',
                'columns' => [],
                'description' => '議程',
                'status' => 1,
            ],
            'speaker' => [
                'sheetKey' => '1ZF6mWynbUWIb234q5ydqpu9XolNE6CRGcwyLygGaTZ4',
                'sheetGridId' => 'ozg0bjp',
                'columns' => [
                    'speaker_id' => '講者編號',
                    'name' => '姓名',
                    'name_en' => '姓名en',
                    'type' => '類別',
                    'company' => '公司',
                    'job' => '職稱',
                    'info' => '個人介紹',
                    'info_en' => '個人介紹en',
                    'picture' => '照片',
                    'filename' => '檔名',
                    'facebook' => 'facebook',
                    'github' => 'github',
                    'blog' => 'blog',
                    'website' => 'website',
                    'linkedin' => 'linkedin',
                    'schedule_topic' => '演講主題',
                    'schedule_topic_en' => '演講主題en',
                    'schedule_info' => '演講摘要',
                    'schedule_info_en' => '演講摘要en',
                    'characters' => '字數全形240',
                    'schedule_id' => '議程編號',
                    'slide' => 'slide',
                    'picture_merged' => '合併講者照片',
                    'video_record' => '禁止錄影',
                ],
                'description' => '講者資料',
                'status' => 1,
            ],
            'schedule-unconf' => [
                'sheetKey' => '1ZF6mWynbUWIb234q5ydqpu9XolNE6CRGcwyLygGaTZ4',
                'sheetGridId' => 'oxo5gdm',
                'columns' => [
                    'period' => '時段',
                    'topic' => '主題',
                    'speaker' => '講者',
                    'period_2' => '時段_2',
                    'topic_2' => '主題_2',
                    'speaker_2' => '講者_2',
                ],
                'description' => '交流場次',
                'status' => 1,
            ],
            'sponsor' => [
                'sheetKey' => '1ZF6mWynbUWIb234q5ydqpu9XolNE6CRGcwyLygGaTZ4',
                'sheetGridId' => 'o6bk8rc',
                'columns' => [
                    'order' => '贊助商編號',
                    'id' => 'id',
                    'type' => '贊助商等級',
                    'name' => '名稱',
                    'name_en' => '名稱en',
                    'info' => '介紹',
                    'info_en' => '介紹en',
                    'website' => '網址',
                    'logo' => '照片',
                    'liaison' => '窗口',
                    'remarks' => 'remarks',
                ],
                'description' => '贊助商',
                'status' => 1,
            ],
            'community' => [
                'sheetKey' => '1ZF6mWynbUWIb234q5ydqpu9XolNE6CRGcwyLygGaTZ4',
                'sheetGridId' => 'o95452q',
                'columns' => [
                    'title' => '社群名稱',
                    'id' => 'id',
                    'logo' => 'logo',
                    'liasion' => '主要聯絡人',
                    'email' => '聯絡email',
                    'info' => '中文介紹',
                    'info_en' => '英文介紹',
                    'facebook' => 'facebook',
                    'other_links' => '其他連結',
                ],
                'description' => '主辦社群',
                'status' => 1,
            ],
            'volunteer' => [
                'sheetKey' => '1ZF6mWynbUWIb234q5ydqpu9XolNE6CRGcwyLygGaTZ4',
                'sheetGridId' => 'o2invo3',
                'columns' => [
                    'id' => 'id',
                    'groupname' => '組別中文名稱',
                    'groupname_en' => '組別英文名稱',
                    'info' => '中文介紹字內',
                    'info_en' => '英文介紹',
                    'memberlist' => '組員名單不限中英文',
                ],
                'description' => '志工組織',
                'status' => 1,
            ],
            'carousel' => [
                'sheetKey' => '1ZF6mWynbUWIb234q5ydqpu9XolNE6CRGcwyLygGaTZ4',
                'sheetGridId' => 'oc61n7p',
                'columns' => [
                    'id' => 'id',
                    'title' => 'title',
                    'banner' => 'banner',
                    'link' => 'link',
                ],
                'description' => '廣告',
                'status' => 1,
            ],
            'news' => [
                'sheetKey' => '1ZF6mWynbUWIb234q5ydqpu9XolNE6CRGcwyLygGaTZ4',
                'sheetGridId' => 'o9dug9m',
                'columns' => [
                    'id' => 'id',
                    'time' => 'time',
                    'title' => 'title',
                    'description' => 'description',
                    'link' => 'link',
                ],
                'description' => '最新消息',
                'status' => 1,
            ],
        ];

        $this->sourceInfo['fieldGame'] = [
            'new-user' => [
                'description' => '大地遊戲：建立錢包',
                'requirement' => ['public_key', 'UUID'],
                'status' => 1,
            ],
            'get-balance' => [
                'description' => '大地遊戲：餘額查詢',
                'requirement' => ['public_key', 'UUID'],
                'status' => 1,
            ],
            'buy-gachapon' => [
                'description' => '大地遊戲：轉蛋',
                'requirement' => ['public_key', 'UUID', 'amount'],
                'status' => 1,
            ],

            // 答題與攤位的部份
            'get-quiz' => [
                'description' => '大地遊戲：題庫',
                'requirement' => null,
                'status' => 1,
            ],
            'solve-quiz' => [
                'description' => '大地遊戲：答題',
                'requirement' => ['public_key', 'id', 'answer'],
                'status' => 1,
            ],
            'get-hawker-qrcode' => [
                'description' => '大地遊戲：攤位 QRCode',
                'requirement' => ['id'],
                'status' => 1,
            ],
            'get-hawker-mission' => [
                'description' => '大地遊戲：攤位挑戰',
                'requirement' => ['id', 'public_key', 'token'],
                'status' => 1,
            ],
        ];
    }

    public function __invoke($request, $response, $next)
    {
        $this->init();
        $routes = preg_replace('/^.*\/api\/(.*)/', '$1', $request->getUri()->getPath());
        $routesParsed = explode('/', $routes);

        $request = $request->withAttribute('routesParsed', $routesParsed);

        // 訪問 TOC
        if ($routesParsed[0] == $this->tocName) {
            $toc = [];
            foreach ($this->sourceInfo as $source => $resource) {
                foreach ($resource as $resourceName => $definition) {
                    if ($definition['status'] != 1) {
                        continue;
                    }
                    $toc[$source][] = [
                        'resourceName' => $resourceName,
                        'resourceDesc' => $definition['description'],
                    ];
                }
            }

            $request = $request->withAttribute('resource', $toc);
            return $next($request, $response);
        }

        // 訪問 Api 資源
        foreach ($this->sourceInfo as $source => $resource) {
            if (in_array($routesParsed[0], array_keys($resource))) {
                $definition = $resource[$routesParsed[0]];
                if ($definition['status'] !== 1) {
                    continue;
                }
                $request = $request
                    ->withAttribute('sourceInfo', $this->sourceInfo)
                    ->withAttribute('sourceFrom', $source)
                    ->withAttribute('resource', $definition);
                return $next($request, $response);
            }
        }

        return parent::__invoke($request, $response, $next);
    }
}
