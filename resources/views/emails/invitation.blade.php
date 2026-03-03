<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitation EasyColoc</title>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f4f7fe;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(99, 102, 241, 0.1);
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px;
            text-align: center;
        }
        .header h1 {
            color: white;
            margin: 0;
            font-size: 24px;
            font-weight: 800;
        }
        .content {
            padding: 40px;
        }
        .button {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            padding: 16px 32px;
            border-radius: 16px;
            font-weight: 700;
            margin: 20px 0;
        }
        .button-decline {
            display: inline-block;
            background: #f1f5f9;
            color: #64748b;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 600;
            margin-left: 10px;
        }
        .footer {
            padding: 20px 40px;
            text-align: center;
            color: #94a3b8;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center" style="padding: 40px 20px;">
                <div class="container">
                    
                    {{-- Header --}}
                    <div class="header">
                        <h1>🏠 EasyColoc</h1>
                    </div>
                    
                    {{-- Content --}}
                    <div class="content">
                        <h2 style="color: #1e293b; font-size: 20px; margin-bottom: 20px;">
                            Vous êtes invité !
                        </h2>
                        
                        <p style="color: #64748b; line-height: 1.6; font-size: 16px;">
                            <strong>{{ $ownerName }}</strong> vous invite à rejoindre la colocation 
                            <strong style="color: #667eea;">"{{ $colocationName }}"</strong> sur EasyColoc.
                        </p>
                        
                        <p style="color: #64748b; line-height: 1.6;">
                            EasyColoc vous permet de gérer facilement vos dépenses communes et de savoir qui doit quoi à qui.
                        </p>
                        
                        <div style="text-align: center; margin: 30px 0;">
                            <a href="{{ $acceptUrl }}" class="button">
                                Rejoindre la colocation
                            </a>
                        </div>
                        
                        <p style="color: #94a3b8; font-size: 14px; text-align: center;">
                            Ce lien expire dans 7 jours.
                        </p>
                        
                        <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 30px 0;">
                        
                        <p style="color: #94a3b8; font-size: 12px; text-align: center;">
                            Si vous ne souhaitez pas rejoindre cette colocation, 
                            <a href="{{ $declineUrl }}" style="color: #64748b;">cliquez ici</a>.
                        </p>
                    </div>
                    
                    {{-- Footer --}}
                    <div class="footer">
                        © 2026 EasyColoc - Gestion simplifiée des colocations
                    </div>
                    
                </div>
            </td>
        </tr>
    </table>
</body>
</html>