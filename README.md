\# System Communication Dashboard (Internship Assignment)



\## Overview

A full-stack dashboard to log system communications (Email / SMS / WhatsApp).

No real messages are sent — it only stores database entries and displays them in tabbed list views.



\## Demo Video

\- View on GitHub: https://github.com/Ashique-Ali18/System-Communication-Dashboard/blob/main/demo/Internship\_task.mp4

\- Direct download: https://raw.githubusercontent.com/Ashique-Ali18/System-Communication-Dashboard/main/demo/Internship\_task.mp4



\## Features

\- Tabs: Emails / SMS / WhatsApp

\- Separate list view columns per channel

\- Modal forms to create logs (AJAX)

\- Toast notifications (success/error)

\- Dashboard counts

\- Search per tab

\- Delete with confirmation

\- Export CSV



\## Tech Stack

\- PHP (XAMPP)

\- MySQL

\- Bootstrap + JavaScript (Fetch API)



\## Setup (XAMPP)

1\. Start Apache + MySQL in XAMPP

2\. Create database: `comms\_dashboard`

3\. Import `database.sql` using phpMyAdmin

4\. Put project inside: `C:\\xampp\\htdocs\\comms-dashboard`

5\. Open: http://localhost/comms-dashboard/



\## API Endpoints

\- GET/POST: api/email.php

\- GET/POST: api/sms.php

\- GET/POST: api/whatsapp.php

\- GET: api/stats.php

\- POST: api/delete.php

