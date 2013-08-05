# Open Emails - Deploying SendGrid and PHP on Engine Yard

Open Emails is a sample app by SendGrid to demonstrate how to deploy SendGrid on Engine Yard.

## Deploying the App
- To deploy this app and integrate SendGrid follow the instructions [in our documentation](http://sendgrid.com/docs/Integrate/Partners/EngineYard.html#-Deploying-a-PHP-App-With-SendGrid-and-Engine-Yard)
- You must then [point the Parse Webhook for your domain](http://sendgrid.com/docs/API_Reference/Webhooks/parse.html) at your instance, specifically at the file `/email.php`. Log in to SendGrid.com with the credentials provided by Engine Yard, to do this.

## Requirements
* Engine Yard Cloud (Tested on `PHP-FPM` `stable-v4`)
* MySQL (Tested with `MySQL 5.5.x`)
* Composer (Default on Engine Yard Cloud)

## Questions/Comments/Help

Please contact Nick Quinlan: [@YayNickQ](http://twitter.com/YayNickQ) / <nick@sendgrid.com> / [nquinlan](http://github.com/nquinlan)