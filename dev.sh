#!/bin/bash
#######################################################
# WalterHost Script v1.0 for CentOS
#######################################################
walterhost_version="2.1"
phpmyadmin_version="4.9.5" # Released 2020-03-21. Older version compatible with PHP 5.5 to 7.4 and MySQL 5.5 and newer. Currently supported for security fixes only.
extplorer_version="2.1.13" # 05/15/2019 04:43 PM
extplorer_id="82"
script_root="https://walterhost.com/scripts"
script_url="https://walterhost.com/scripts/7"
low_ram='262144' # 256MB
printf "=========================================================================\n"
printf "Chung ta se kiem tra cac thong so VPS cua ban de dua ra cai dat hop ly \n"
printf "=========================================================================\n"

cpu_name=$(awk -F: '/model name/ {name=$2} END {print name}' /proc/cpuinfo)
cpu_cores=$(awk -F: '/model name/ {core++} END {print core}' /proc/cpuinfo)
cpu_freq=$(awk -F: ' /cpu MHz/ {freq=$2} END {print freq}' /proc/cpuinfo)
server_ram_total=$(awk '/MemTotal/ {print $2}' /proc/meminfo)
server_ram_mb=$(echo "scale=0;$server_ram_total/1024" | bc)
server_hdd=$(df -h | awk 'NR==2 {print $2}')
server_swap_total=$(awk '/SwapTotal/ {print $2}' /proc/meminfo)
server_swap_mb=$(echo "scale=0;$server_swap_total/1024" | bc)
server_ip=$(curl -s $script_root/ip/)

printf "=========================================================================\n"
printf "Thong so server cua ban nhu sau \n"
printf "=========================================================================\n"
echo "Loai CPU : $cpu_name"
echo "Tong so CPU core : $cpu_cores"
echo "Toc do moi core : $cpu_freq MHz"
echo "Tong dung luong RAM : $server_ram_mb MB"
echo "Tong dung luong swap : $server_swap_mb MB"
echo "Tong dung luong o dia : $server_hdd GB"
echo "IP cua server la : $server_ip"
printf "=========================================================================\n"
printf "=========================================================================\n"