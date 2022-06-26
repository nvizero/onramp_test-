FROM debian:11
WORKDIR /app
RUN apt update -y
RUN apt install curl wget -y
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get install ca-certificates apt-transport-https software-properties-common -y
RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/sury-php.list    
RUN wget -qO - https://packages.sury.org/php/apt.gpg | apt-key add -
RUN apt update -y
RUN apt-get install php8.0
RUN apt-get install php php-common php-xml php-gd php-mbstring php-tokenizer php-json php-bcmath php-zip -y
EXPOSE 80
