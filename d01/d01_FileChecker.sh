# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    d01_FileChecker.sh                                 :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: nsabbah <nsabbah@student.42.fr>            +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2017/04/05 18:33:41 by nsabbah           #+#    #+#              #
#    Updated: 2017/04/05 20:52:47 by nsabbah          ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

echo "#!/usr/bin/php
<?php
include(\"ex03/ft_split.php\");
print_r(ft_split(\"      Hello      World  AAA   \"));
?>" > main.php
chmod 755 main.php

# echo "#!/usr/bin/php
# <?PHP
# include(\"ft_is_sort.php\");
# $tab = array\(\"!/@#;^\", \"42\", \"Hello World\", \"salut\", \"zZzZzZz\");
# $tab[] \= \"Et qu’est-ce qu’on fait maintenant ?\";
# if (ft_is_sort($tab))
# echo \"Le tableau est trie\n\";
# else
# echo \"Le tableau n’est pas trie\n\";
# ?>" > main2.php
# chmod 755 main2.php

printf "\e[0;32m\n\n################## EX00 ##############\n \e[0m\n"
./ex00/hw.php | cat -e
echo "Hello World$"

printf "\e[0;32m\n\n################## EX01 ##############\n \e[0m\n"
./ex01/mlx.php | cat -e
echo "\n"
echo "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX$"

printf "\e[0;32m\n\n################## EX02 ##############\n \e[0m\n"

echo "How to?"

printf "\e[0;32m\n\n################## EX03 ##############\n \e[0m\n"
./main.php | cat -e
echo "\n"
echo "Array$
($
    [0] => AAA$
    [1] => Hello$
    [2] => World$
)$"

printf "\e[0;32m\n\n################## EX04 ##############\n \e[0m\n"
	./ex04/aff_param.php 123123 dsf fj0 "sdf asdfsdf kl" | cat -e
	echo "\n"
	echo "123123$
dsf$
fj0$
sdf asdfsdf kl$"

printf "\e[0;32m\n\n################## EX05 ##############\n \e[0m\n"
	echo "TEST1 :    OPT_3   is      a string    with space  "
	$@ ./ex05/epur_str.php "   OPT_3   is      a string    with space  " | cat -e
	echo "OPT_3 is a string with space$"
	echo "\n"

	echo "TEST2"
	$@ ./ex05/epur_str.php "   OPT_3   is      a string    with space  " " " | cat -e
	echo "Ok if nothing displayed"
	echo "\n"

	echo "TEST3"
	$@ ./ex05/epur_str.php | cat -e
	echo "Ok if nothing displayed"
	echo "\n"

	echo "TEST4"
	$@ ./ex05/epur_str.php "   "| cat -e
	echo "Ok if nothing displayed"
	echo "\n"

printf "\e[0;32m\n\n################## EX06 ##############\n \e[0m\n"
	$@ ./ex06/ssap.php foo bar "yo man" "A moi compte, deux mots" Xibul | cat -e
	echo "\n"
	echo "A$
Xibul$
bar$
compte,$
deux$
foo$
man$
moi$
mots$
yo$"

printf "\e[0;32m\n\n################## EX07 ##############\n \e[0m\n"
	echo "TEST1"
	$@ ./ex07/rostring.php "hello world aaa" fslkdjf | cat -e
	echo "world aaa hello$"

	echo "\nTEST2"
	$@ ./ex07/rostring.php "  	hello world aaa" fslkdjf | cat -e
	echo "world aaa hello$"

printf "\e[0;32m\n\n################## EX08 ##############\n \e[0m\n"
	echo "How to?"


printf "\e[0;32m\n\n################## EX09 ##############\n \e[0m\n"
	$@ ./ex09/ssap2.php toto tutu 4234 "_hop XXX" \#\# "1948372 AhAhAh" | cat -e
	echo "\n"
	echo "AhAhAh$
toto$
tutu$
XXX$
1948372$
4234$
##$
_hop$"

printf "\e[0;32m\n\n################## EX10 ##############\n \e[0m\n"
	echo "TEST1"
	$@ ./ex10/do_op.php " 1" " +" " 3" | cat -e
	echo "4$"
	echo "\n"
	echo "TEST2"
	$@ ./ex10/do_op.php " -20" " *" " 3012" | cat -e
	echo "-60240$"
	echo "\n"
	echo "TEST3"
	$@ ./ex10/do_op.php " 1" " %" " 2" | cat -e
	echo "1$"
	echo "\n"
	echo "TEST4"
	$@ ./ex10/do_op.php " -20" " /" " 0" | cat -e
	echo "Warning: Division by zero[..]$"
	echo "\n"
	echo "TEST5"
	$@ ./ex10/do_op.php " -20" " %" " 0" | cat -e
	echo "Warning: Division by zero[..]$"
	echo "\n"

printf "\e[0;32m\n\n################## EX11 ##############\n \e[0m\n"
	echo "TEST1"
	$@ ./ex11/do_op_2.php | cat -e
	echo "Incorrect Parameters$"
	echo "\n"
	echo "TEST2"
	$@ ./ex11/do_op_2.php asdf asdf | cat -e
	echo "Incorrect Parameters$"
	echo "\n"
	echo "TEST3"
	$@ ./ex11/do_op_2.php " -20*-3012" | cat -e
	echo "60240$"
	echo "\n"
	echo "TEST4"
	$@ ./ex11/do_op_2.php "-   1 % 2" | cat -e
	echo "Syntax Error$"
	echo "\n"
	echo "TEST5"
	$@ ./ex11/do_op_2.php toto | cat -e
	echo "Syntax Error$"
	echo "\n"
	echo "TEST5"
	$@ ./ex11/do_op_2.php "0/0" | cat -e
	echo "Syntax Error$"
	echo "\n"

printf "\e[0;32m\n\n################## EX12 ##############\n \e[0m\n"
	echo "TEST0"
	$@  ./ex12/search_it\!.php toto "key1:val1" "key2:val2" "toto:42" | cat -e
	echo "42$"
	echo "\n"
	echo "TEST1"
	$@ ./ex12/search_it\!.php toto "toto:val1" "key2:val2" "toto:42" | cat -e
	echo "42$"
	echo "\n"
	echo "TEST2"
	$@ ./ex12/search_it\!.php "toto" "key1:val1" "key2:val2" "0:hop" | cat -e
	echo "Ok if nothing displayed"
	echo "\n"
	echo "TEST3"
	$@ ./ex12/search_it\!.php toto | cat -e
	echo "Ok if nothing displayed"
	echo "\n"
