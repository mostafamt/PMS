![](https://github.com/mostafamt/MyRepo/blob/master/home.png)
# PMS
This is the first stone for our graduation project 'project Management System ' .

### Team
1- Mostafa Kamel ([**mostafamt**](https://www.github.com/mostafamt))<br>
2- Nasser Maher ([**NasserMaher**](https://www.github.com/NasserMaher))<br>
3- Osama Mohammed ([**OsamaMuharram**](https://www.github.com/OsamaMuharram))<br>
4- Abdelahmeid Elsayed ([**AbdlhamidElsayd**](https://github.com/AbdlhamidElsayd))<br>
5- Abdallah Salah([**AbdoSMarei**](https://github.com/AbdoSMarei))<br>
6- Nasr Mohammed<br>
7- Abdallah Elharouni <br>

### Installation video tutorials
1- [Install Git](https://www.youtube.com/watch?v=LVRKNxteHlA&list=PLoEshgDAP9LLimxRT6-p82jFPd3WKeUc7&index=6&t=1s)<br>
2- [Install Xampp](https://www.youtube.com/watch?v=FG03K5MzeBk&list=PLoEshgDAP9LLimxRT6-p82jFPd3WKeUc7&index=2&t=0s)<br>
3- [Create Database](https://www.youtube.com/watch?v=oANlvT2QT8c&list=PLoEshgDAP9LLimxRT6-p82jFPd3WKeUc7&index=3&t=0s)<br>
4- [Install Composer](https://www.youtube.com/watch?v=n5uj92GiXbo&list=PLoEshgDAP9LLimxRT6-p82jFPd3WKeUc7&index=4&t=0s)<br>
5- [Setup and run](https://www.youtube.com/watch?v=ZmKNDeEoE1I&list=PLoEshgDAP9LLimxRT6-p82jFPd3WKeUc7&index=5&t=0s)<br>


### How to install ?
1 -  ```git clone https://github.com/mostafamt/PMS``` <br>
2 - ```cd PMS``` <br>
3 - ```composer update``` <br>
4 - ```copy .env.example .env``` <br>
5 - ```php artisan key:generate``` <br>
6 - edit .env file , edit these parameters : <br>
    DB_DATABASE=pms <br>
    DB_USERNAME=root <br>
    DB_PASSWORD= <br>
7 - ```php artisan migrate``` <br>
8 - This step is optional to fill database : ```php artisan db:seed```<br>
9 - ```php artisan serve``` <br>

### How to push to our repo ?
1 - ```git status```<br>
2 - ```git pull push https://github.com/mostafamt/PMS```<br>
3 - ```git add .```<br>
4 - ```git commit -m "your comment"```<br>
5 - ```git push https://github.com/mostafamt/PMS master```<br>
