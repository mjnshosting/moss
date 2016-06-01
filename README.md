The purpose of this project is to make an interface that will be placed on a small raspberry pi/pc/server. 
With said device we run various diagnostic tests such as a ping/trace/mtr/iperf from the interface. Other
interfaces have been created to take control of tools such as Wake-On-LAN to turn on a pc/server and even
the ability to control network capable APC PDUs for remote control of power outlets. More features are being
worked on but this realease should suffice. This was done to fill a need and became even greater. There are
so many useful projects out there and I wanted to integrate them all into a nice package. 

# Overview:

## Login Page:
    Template provided by [w3layouts](https://w3layouts.com/preview/?l=/entrar-shadow-flat-form-template/)
    using the [php-login-one-file by panique](https://github.com/panique/php-login-one-file) which both have 
    been modified for this project. Changing the color scheme and functionality of the registration page. 
    
## Status: 
    Defualt landing page after log in. Shows system information such as hardware/software info, resource usage,
    mount points, uptime, interface stats, apcupsd info (if daemon exists) and more as time goes on. 