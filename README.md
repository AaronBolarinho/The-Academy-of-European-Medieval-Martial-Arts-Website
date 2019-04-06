# The Academy of European Medieval Martial Arts

## Website Project - By Aaron Bolarinho

Hello and welcome!

### Overview

The purpose of the AEMMA website is to provide a single point of contact for all AEMMA students for news, updates, curriculum, study regardless of which Chapter they are a member. AEMMA now has half a dozen schools across southern Ontario and one school in Nova Scotia - all students deserve equal access to all resources.

The website www.aemma.org was begun approx. 15 years ago by David Cvet, founder of AEMMA. The second version of this website is currently under construction and not yet pushed to production. It is predominantly constructed with over 300K lines of vanilla PHP, connected to a MySQL database. Under the direction of Mr. Cvet I have begun to assist in the completion of this project. 

This current project stack is: MySQL|NodeJS|Express|React, with some Reactstrap and other CSS elements added as well.

My part of this project is to help complete version two of the AEMMA website by constructing pages in this code base, and then including them in the PHP code through an iframe while communicating with the shared MySQL database.

 - React Project is found in my-app folder
 - PHP code is found in Web Development folder

Eventually, when the website gets pushed to production, I will be running this React project on its own server so it can fit into the production version of the AEMMA Website.

After version two of the AEMMA website is complete, further development will continue in this React project.

Please send any questions, comments, or concerns to me at aaron.bolarinho@gmail.com.

*NB - Due to the fact that a number of files are .gitignored for a few reasons including file size (media files etc) and security, at this stage it isnt possible to download this repo and run it without compile failure messages.

###  Pages Under Construction:

**Equipment Pages:**
- Planned to be locked behind a student login

current link : [https://www.aemma.org/content/equip_recruit.php]

current status:

 - recruit page: **mvp complete**
 - scholar page: under construction
 - free scholar page: under construction

Overview:

These equipment pages need to serve AEMMA students equipment needs. Students require guidance on: 

1. What equipment do they need?
2. When do they need to purchase it?
3. What brands are recommended?
4. How much does it cost?
5. What do other students think about those brands?

The new equipment pages will be individual to each of AEMMA's three main ranks - recruit, scholar, and free scholar.

***Recruit Page:***

This new page now has:

 - A list of all required gear.
 - A timeline for the student.
 - Each required equipment item type has a table showing recommended brands with a brand name, link to website, and an average rating.
 - Students my recommend brands themselves.
 - Each recommended item has its own pop-up list of reviews
 - In the pop up review modal, you can see all student reviews and ratings
 - In that same modal, you can also write your own review of the product

See a brief demo below:

![alt-text](https://github.com/AaronBolarinho/aemma/blob/master/my-app/src/css/ezgif.com-optimize.gif)

### Completed Pages:

None quite yet!
