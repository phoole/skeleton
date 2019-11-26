FROM php:latest

RUN apt-get update

RUN apt-get install vim -y && \
    apt-get install openssl -y && \
    apt-get install libssl-dev -y && \
    apt-get install wget -y

RUN cd /tmp && wget https://pecl.php.net/get/swoole-4.4.12.tgz && \
    tar zxvf swoole-4.4.12.tgz && \
    cd swoole-4.4.12  && \
    phpize  && \
    ./configure  --enable-openssl && \
    make && make install

RUN touch /usr/local/etc/php/conf.d/swoole.ini && \
    echo 'extension=swoole.so' > /usr/local/etc/php/conf.d/swoole.ini

RUN mkdir -p /phoole

WORKDIR /phoole

COPY . /phoole

EXPOSE 8080
CMD ["/usr/local/bin/php", "/phoole/system/bin/httpServer.php"]