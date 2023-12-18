FROM nginx

COPY vhost.conf /etc/nginx/conf.d/default.conf
EXPOSE 8081

RUN ln -sf /dev/stdout /var/log/nginx/access.log
RUN ln -sf /dev/stderr /var/log/nginx/error.log