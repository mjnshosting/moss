# Updated Install instrucitons are located at: 
    https://mjnshosting.atlassian.net/wiki/display/MKB/MOSS+Installation+Instructions

# Overview:
    The purpose of this project is to make an interface that will be placed on a small raspberry pi/pc/server. 
    With said device we run various diagnostic tests such as a ping/trace/mtr/iperf from the interface. Other
    interfaces have been created to take control of tools such as Wake-On-LAN to turn on a pc/server and even
    the ability to control network capable APC PDUs for remote control of power outlets. More features are being
    worked on but this realease should suffice. This was done to fill a need and became even greater. There are
    so many useful projects out there and I wanted to integrate them all into a nice package. 



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
    which is what we have planned for the next phase of this project (**EPO**). A pptp_reconnect script is ran via 
    cron job that checks the tunnel's health. Updates then tunnels status when on the Tunnel Home page as well as 
    reconnect using newly entered credentials. The monitor IP can be changed from the tool's page. 

## Connectivity:
    This serves as a general connectivity and information tool for basic tests over IPv4 and IPv6. This tool is v4 
    v6 aware for Ping, Traceroute, Whois, and Nmap. DNS lookups have been disabled for speed and formatting purposed. 
    
## Wake On LAN:
    This is where it all started. A simple Wake On LAN interface that takes a description, MAC address, and IP. 
    Beside each entry there is a Wake and Delete button. The IP address can be used on the "Connectivity" page 
    to see if the device has indeed woken up and is accessible via the network. If an extended ping is needed you
    can use the "Shell Access" page.
    
## Remote Power Control:
    This tool can control a network capable APC Power Distribution Units over the on the LAN or the WAN. 
    This tool allows you to control the ports and check if the port is ON or OFF by selecting the desired 
    entry's radio button and pressing the status icon which will update the "Status" column for the selected entry.
    **This tool passes credentials via telnet and should only be used on a trusted network and the PDU should not be 
    given a gateway unless absolutely necessary. Please view README and notes concernning PDU setup.**

## Shell Access:
    A web based shell provided by the [Shell In a Box](https://code.google.com/archive/p/shellinabox/) with an unofficial
    fork located on GitHub (https://github.com/shellinabox/shellinabox). This is a web based shell that is proxied via 
    Apache. From here you can have full access to the command line interface of the device to run tools that are not 
    included in the web interface like iperf, nmap with more detailed options, and whatever else you want. 
    Shell is the limit I guess you could say. 
    
## Remote Support: 
    Here you can add remote support executables for customers if you choose but that depends on access to this interface
    and if you allow customers to have such access. 
    
## Credits/License:
    This project was inspired by [RPi-Experiences'](http://rpi-experiences.blogspot.com/p/rpi-monitor.html) RPi-Monitor
    which is what I used and got the idea from. I did customize its interface quite a bit but wanted something a bit 
    easier to edit and add tools to. Using JQuery and PHP I was able to achieve something like it but have a ways to 
    go before i can match it. Also this project is more a tool to provide other services. Here you will find more 
    information about the major projects used and their repspective license. Please note that this information needs
    to be added if you plan to fork this project due to licensing. 
    
    

# PDU Setup:
    The RPC tool uses the fence_apc which is apart of the fence-agents package. It can communicate over ssh by adding
    -x to the command but it was not operational with my test unit (APC AP7901) so the -x is not included by default but
    can be easily added. If like me you got the device second hand and need to gain access to it you will need press the 
    reset button twice using a paper clip and connect to the PDU via a 6-pin serial cable (APC 940-0144 or 940-0144A) that
    you can make or buy off eBay (easier). Use minicom or hyperterminal with the following settings 9600 8N1 no hardware
    and software flow control. Go through the various menus and make changes as you see fit. Be sure to change the connection
    type to Telnet under (2)Network -> (5)Telnet/SSH -> (2)Protocol Mode -> then (6)Accept Changes on the previous menu.
    Changes will be applied when you log out. 
    
    
