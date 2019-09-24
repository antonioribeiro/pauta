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
        return response()->streamDownload(function () use ($data) {
            echo $data['link'];
        }, $data['code'] . '.txt');
    }

    protected function encodeUrl($url)
    {
        preg_match('/.*alerjln1.alerj.rj.gov.br([^?]*)/', $url, $matches);

        return base64_encode($matches[1]);
    }

    public function generateLink()
    {
        return sprintf('http://www3.alerj.rj.gov.br/lotus_notes/default.asp?id=%s&url=%s',
            $this->id,
            $this->encodeUrl($this->url)
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

// http://alerjln1.alerj.rj.gov.br/scpro1923.nsf/0c5bf5cde95601f903256caa0023131b/5952e182da73cd308325847a00600cdf?OpenDocument&Highlight=0,20190301314
// http://www3.alerj.rj.gov.br/lotus_notes/default.asp?id=144&url=L3NjcHJvMTkyMy5uc2YvMGM1YmY1Y2RlOTU2MDFmOTAzMjU2Y2FhMDAyMzEzMWIvNTk1MmUxODJkYTczY2QzMDgzMjU4NDdhMDA2MDBjZGY/T3BlbkRvY3VtZW50JkhpZ2hsaWdodD0wLDIwMTkwMzAxMzE0P09wZW5Eb2N1bWVudCZFeHBhbmRWaWV3
// http://www3.alerj.rj.gov.br/lotus_notes/default.asp?id=144&url=aHR0cDovL2FsZXJqbG4xLmFsZXJqLnJqLmdvdi5ici9zY3BybzE5MjMubnNmLzBjNWJmNWNkZTk1NjAxZjkwMzI1NmNhYTAwMjMxMzFiLzU5NTJlMTgyZGE3M2NkMzA4MzI1ODQ3YTAwNjAwY2RmP09wZW5Eb2N1bWVudA==
// http://alerjln1.alerj.rj.gov.br/scpro1923.nsf/0c5bf5cde95601f903256caa0023131b/5952e182da73cd308325847a00600cdf?OpenDocument
