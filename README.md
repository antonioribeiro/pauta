
## API para conversão de links pra pauta (Notes para Web)

#### Endpoint da API
```
http://pauta.antoniocarlosribeiro.com/api/v1/convert-link
```

#### Formato da API
```
http://pauta.antoniocarlosribeiro.com/api/v1/convert-link?url={URL_NOTES}&code={CODIGO}&id={ID}&format={txt ou json}
```

#### Exemplo TXT (download do arquivo)
```
http://pauta.antoniocarlosribeiro.com/api/v1/convert-link?url=http://alerjln1.alerj.rj.gov.br/scpro1923.nsf/0c5bf5cde95601f903256caa0023131b/5952e182da73cd308325847a00600cdf?OpenDocument&Highlight=0,20190301314&code=20190301314&id=144&format=txt
```

#### Exemplo JSON (retorna um objeto com todos os dados)
```
http://pauta.antoniocarlosribeiro.com/api/v1/convert-link?url=http://alerjln1.alerj.rj.gov.br/scpro1923.nsf/0c5bf5cde95601f903256caa0023131b/5952e182da73cd308325847a00600cdf?OpenDocument&Highlight=0,20190301314&code=20190301314&id=144&format=json
```

Resultado: 

``` json
{
  "format": "json",
  "url": "http://alerjln1.alerj.rj.gov.br/scpro1923.nsf/0c5bf5cde95601f903256caa0023131b/5952e182da73cd308325847a00600cdf?OpenDocument",
  "link": "http://www3.alerj.rj.gov.br/lotus_notes/default.asp?id=144&url=L3NjcHJvMTkyMy5uc2YvMGM1YmY1Y2RlOTU2MDFmOTAzMjU2Y2FhMDAyMzEzMWIvNTk1MmUxODJkYTczY2QzMDgzMjU4NDdhMDA2MDBjZGY=",
  "code": "20190301314",
  "id": "144"
}
```
