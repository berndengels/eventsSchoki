APP_NAME="Schokoladen Berlin-Mitte"
APP_PLATFORM=schoki
APP_ENV=staging
APP_KEY=base64:JjR21ElKqs4KWCbAgPo3ZKeL8me7qTR6PeP1lPAHbnc=
APP_DEBUG=false
DEBUGBAR_ENABLED=false
APP_URL=https://test.schokoladen-mitte.de
LOG_CHANNEL=stack
REDIRECT_HTTPS=true
WEB_TERMINAL=false
TELESCOPE_ENABLED=false

DB_CONNECTION=mysql
DB_HOST=db01.crpt.xyz
DB_PORT=3306
DB_DATABASE=schokoladen_test
DB_USERNAME=
DB_PASSWORD=
DB_BINARY_PATH=/usr/bin

# shop
CASHIER_MODEL=App\Models\Costumer
STRIPE_KEY=
STRIPE_SECRET=
CASHIER_CURRENCY=eur
CASHIER_CURRENCY_LOCALE=de_DE
CASHIER_LOGGER=stack

BROADCAST_DRIVER=log
CACHE_DRIVER=memcached
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.cryptix.net
MAIL_PORT=587
MAIL_USERNAME=shop@schokoladen-mitte.de
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=shop@schokoladen-mitte.de
MAIL_FROM_NAME="Schokoladen Berlin"

EXCEPTION_EMAIL_ENABLED=true
EXCEPTION_TO_EMAIL_ADDRESS=engels@goldenacker.de
EXCEPTION_FROM_EMAIL_ADDRESS=engels@goldenacker.de
EXCEPTION_EMAIL_SUBJECT="${APP_NAME} Error"

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

NOCAPTCHA_SITEKEY=
NOCAPTCHA_SECRET=

JWT_SECRET=
JWT_PUBLIC_KEY=
JWT_PRIVATE_KEY=
JWT_PASSPHRASE=

# page specific properties
MAX_IMAGE_WIDTH=533
MAX_IMAGE_HEIGHT=300
MAX_IMAGE_FILESIZE=3
DEFAULT_EVENT_TIME=19:00

PIWIK_URL=
PIWIK_SITE_ID=1

ICAL_NAME="Schokoladen Events"
ICAL_DESCRIPTION="Schokoladen Berlin-Mitte Veranstaltungs-Plan https://www.schokoladen-mitte.de"
ICAL_LOCATION="Ackerstrasse 169, 10115 Berlin"
LOCATION_LAT=52.529745
LOCATION_LNG=13.397245
