FROM php:7.2-apache
RUN mkdir /var/www/mscprojectdhwani.cloud
WORKDIR /var/www/mscprojectdhwani.cloud
COPY index.html .
COPY img_back.jpg .
COPY tab_test.php .
#RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-install mysqli pdo pdo_mysql
# Copy the SSL configuration files to the container
WORKDIR /etc/apache2/sites-available
COPY mscprojectdhwani.cloud.conf /etc/apache2/sites-available/
RUN apt update -y && apt install certbot python3-certbot-apache -y 
RUN a2dissite 000-default.conf && a2ensite mscprojectdhwani.cloud.conf && service apache2 restart
#RUN certbot certonly --agree-tos --non-interactive --standalone --email your-email@example.com -d yourdomain.com
EXPOSE 80 443
#RUN certbot certonly --apache --non-interactive --agree-tos -m bhikeshkhute10.3@gmail.com -d www.mscprojectdhwani.cloud

# Disable the default Apache configuration file and enable the new configuration files
#EXPOSE 80 443
