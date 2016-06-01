The purpose of this project is to make an interface that will be placed on a small raspberry pi/pc/server. 
With said device we run various diagnostic tests such as a ping/trace/mtr/iperf from the interface. Other
interfaces have been created to take control of tools such as Wake-On-LAN to turn on a pc/server and even
the ability to control network capable APC PDUs for remote control of power outlets. More features are being
worked on but this realease should suffice. This was done to fill a need and became even greater. There are
so many useful projects out there and I wanted to integrate them all into a nice package. 

# Overview:

## Login:
    Template provided by [w3layouts](https://w3layouts.com/preview/?l=/entrar-shadow-flat-form-template/)
    using the [php-login-one-file by panique] (https://github.com/panique/php-login-one-file) which both have 
    been modified for this project. Changing the color scheme and functionality of the registration page. 
    
## Status: 
    Defualt landing page after log in. Shows system information such as hardware/software info, resource usage,
    mount points, uptime, interface stats, apcupsd info (if daemon exists) and more as time goes on. 
    
## Network Health:
    This is a [cacti](http://cacti.net/) install which is an open source light weight network monitoring and data 
    graphing tool that has many plugins available. Device interface statistics, hard drive usage, and connectivity
    are graphed using templates or custom graphs. 
    
## Tunnel Home:
    The Tunnel Home interface also known as "Behind Enemy Lines" allows the device to connect back to a centrally
    located server via PPTP (insecure) which serves as a central point of access for the MOSS device. This is 
    the best way to communicate with the device on site without opening up ports in the customer's firewall as well
    as allowing our device to traverse multi-NATed networks. All commuinications with the MOSS device as via secure
    protocols like HTTPS and SSH unless configured otherwise which we do not suggest because of the insecure nature
    PPTP. PPTP can be switched out with other VPN protocols such as OpenVPN (future default) and IPSec. PPTP is just
    easier and gives us what we need at this point which is a tunnel. This tunnel can terminate to a central server
    which is what we have planned for the next phase of this project (**EPO**). 

## Connectivity:
    This serves as a general connectivity and information tool that 
    