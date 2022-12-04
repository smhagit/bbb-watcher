# HomeIP
![Docker Image CI](https://github.com/smhagit/bbb-watcher/actions/workflows/docker-image.yml/badge.svg?branch=master)

This is a small php container which returns a simple response indicates if a explicit configured meeting room is running.
The purpose of it is it's use-case in a smart home automation, which cannot itself handle the authentication to BigBlueButton API.

# Platform: ARM
As this Docker Image is primary used on my Raspberries, so the base image is arm based `arm64v8/php:8.0-apache`.

# Docker 
`docker pull smhagit/bbb-watcher`

This image is built with GitHub Actions via self-hosted runner on an arm64 Raspberry Pi.

## Usage
Provide your BBB shared secret (grab from your BBB host via `bbb-conf --secret`), your URl and the meeting name.

Make a http request to get a response like a simple `online|offline|error`.

`docker-compose.yml`  
```yaml
version: "3.8"
services:
    app:
        image: smhagit/bbb-watcher
        environment:
            BBB_SECRET: "the bbb secret"
            BBB_SERVER_BASE_URL: "https://HOSTNAME/bigbluebutton/"
            WATCH_MEETING_NAME: "the room name"
```


# Development
Local development:  
- 1) composer req bigbluebutton/bigbluebutton-api-php
- 2) php -f index.php
- 3) output: online|offline|error


