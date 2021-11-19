<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">
  <title>{{$data['subject']}}</title>
  <style>
    table, td, div, h1, p {font-family: Arial, sans-serif;}
  </style>
</head>
<body style="margin:0;padding:0;text-align: center;">
  <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
    <tr>
      <td style="text-align: center;padding:0;">
        <table role="presentation" style="width:602px;display: inline-block;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
          <tr>
            <td  style="text-align: center;padding:0px 0 0px 0;background:#70bbd9;">
              <img src="{{asset('assets/images/email.png')}}" alt="" width="100%" style="height:auto;display:block;" />
            </td>
          </tr>
          <tr>
            <td style="padding:36px 30px 42px 30px;">
              <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                <tr>
                  <td style="padding:0 0 36px 0;color:#153643;">
                    <h3 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif">Dear Partner </h3>
                  
                      <ul>
                        @foreach ($data['schooles']  as $schoole)
                            <li>Schoole Name :{{ $schoole->name }} -- Student count: {{ $schoole->students_count }}</li>
                        @endforeach
                      </ul>
                      Thank you
                    </div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
