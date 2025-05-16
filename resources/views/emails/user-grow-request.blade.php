<!DOCTYPE html>
<html>
<head>
    <title>Grow Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F9F9F9;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 30px auto;
            background-color: #FFFFFF;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgb(34, 34, 34);
            overflow: hidden;
        }
        .header {
            background-color: #efc433;
            color: #FFFFFF;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
        }
        .content p {
            font-size: 16px;
            line-height: 1.5;
        }
        .highlight {
            font-size: 18px;
            font-weight: bold;
            color: #efc433;
        }
        .footer {
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #777;
            background-color: #F1F1F1;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Grow Request</h1>
        </div>
        <div class="content">
            <p>Hello {{ $toData['name'] }},</p>
            <p>You have received a new grow request. Here are the details:</p>

            <p>
                <div>
                    <strong>Name:</strong> {{ $data['salesperson_name'] }}
                </div>
                <div>
                   <strong>Email:</strong> {{ $data['salesperson_email'] }}
                </div>
                <div>
                   <strong>Scale-Up :</strong> <span class="highlight">{{ $data['scale_up'] }}</span>
                </div>
            </p>

            @if ($data['is_linked_in_check'] === false && $data['is_online_training_check'] === false && $data['is_crm_optimization_check'] === false && $data['is_cold_calling_check'] === false)
                <p><strong>Interested Services:</strong> None</p>
            @else
            <p><strong>Interested Services:</strong></p>
            <ul>
                @if($data['is_linked_in_check'] === true) <li>LinkedIn</li> @endif
                @if($data['is_online_training_check'] === true) <li>Online Training</li> @endif
                @if($data['is_crm_optimization_check'] === true) <li>CRM Optimization</li> @endif
                @if($data['is_cold_calling_check'] === true) <li>Cold Calling</li> @endif
            </ul>
            @endif
        </div>
        <div class="footer">

        </div>
    </div>
</body>
</html>
