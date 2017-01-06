# Sneaky_Redirects
Sneaky redirect users back to index page while current page consist some keywords.

# Story
I work for a China social media company. For some political reasons, my boss want some keywords to be cloaked in the static pages. I could not find an available solution on the internet, so I code it myself.
Please enjoy it!!!

# nginx Setting
Redirect All html / htm files to a middleware:sneaky.php

 server {

    location ~* \.htm$ {
        if ($remote_addr != 'my ip') {
            rewrite ^ /sneaky.php?url=$request_uri last;
        }
    }

    location ~* \.html$ {
        if ($remote_addr != 'my ip') {
            rewrite ^ /sneaky.php?url=$request_uri last;
        }
    }
}
