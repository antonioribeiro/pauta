<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinkGenerator extends Controller
{
    protected $format = 'json';

    protected $url;

    protected $code;

    protected $id;

    public function __construct(Request $request)
    {
        $this->id = $request->get('id') ?? '144';

        $this->format = $request->get('format') ?? $this->format;

        $this->code = $request->get('code') ?? 'web-link';

        $this->url = $request->get('url');
    }

    /**
     * Show the application dashboard.
     *
     * @return string
     */
    public function convert()
    {
        return $this->generateResponse([
            'format' => $this->format,

            'url' => $this->url,

            'link' => $this->generateLink(),

            'code' => $this->code,

            'id' => $this->id,
        ]);
    }

    /**
     * @param $data
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    protected function downloadFile($data): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        return response()->streamDownload(function () {
            echo $data['link'];
        }, $data['code'] . '.txt');
    }

    public function generateLink()
    {
        return sprintf('http://www3.alerj.rj.gov.br/lotus_notes/default.asp?id=%s&url=%s',
            $this->id,
            base64_encode($this->url)
        );
    }

    protected function generateResponse($data)
    {
        if ($this->format === 'json') {
            return $data;
        }

        return $this->downloadFile($data);
    }
}
