while read line
do
curl -g "$line" | grep '<div class="title"><a href="http://www.hachette-vins.com/guide-vins/les-vins/' >> pages
done < links
cut -f4 -d"\"" pages > information 
