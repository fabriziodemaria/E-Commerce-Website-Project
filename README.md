# E-Commerce-Website-Project
University project involving Javascript, PHP, HTML, CSS, security and database’s queries management.

##PROJECT REQUIREMENTS

The project consists in a simplified version of an auctions management website. The site MUST adhere to the following specifications:

1. Each user can register to the website by providing first name, last name, password and a valid email address (this last one is used as username). A registered user can either bid for any good on sale and also put his/her own goods on sale.

2. Before logging into the system, a button or link must be shown in order for anyone (even not registered users) to display the list of all the goods on sale, along with the highest bid for each item in the list (only the bid, without the user who made it). The list of goods on sale must be sorted by insertion date, from the most recent one to the oldest.

3. After logging into the system, a user can display the list of his/her own valid bids (i.e. the bids that have not been surmounted by other bids) and the list of his/her own goods on sale along with the highest bid for each item in the list and the user who made it. A logged in user must also have the possibility to make bids for goods put on sale by other users. The bid and the owner name must be hidden to the other users except for the one who put the item on sale.

4. The website must allow each user to bid for any good on sale except for the goods that have been put on sale by the user himself/herself. The website must accept a bid for a good only if it is strictly higher than the current highest bid or if no bid is yet present in the system for that particular good.

5. In the submitted project two users must already exist in the DB with usernames u1@polito.it and u1@polito.it, and passwords p1 and p2. Each user must have put on sale two distinct goods, and each user must have bidden for an object of the other user.

6. User authentication (login) must be performed (when requested) by using username and password and it must expire after 2 minutes of user inactivity. If a user tries to perform any operation among the ones already described (which requires user authentication) after 2 minutes of inactivity, the operation must be discarded and the user redirected again to a login page. The user must be forced to use the HTTPS protocol for the authentication process and for all the operations that require user authentication.

7. The general appearance of the web pages must include: a header in the upper part of the page, a navigation bar on the left side with all the links needed to perform the various operations, and a central part which is used for the main operation.

8. Cookies and Javascript must be enabled, otherwise the website may not work properly (in that case, for what concerns cookies, the user must be alerted and the website navigation must be forbidden, for what concerns Javascript the user must be informed). Forms should be provided with small informational messages in order to explain the meaning of the different fields. These messages may be put within the fields or may appear when the mouse pointer is over them.

9. The graphical layout must be consistent, that is the pages must be as much as possible uniform across all the different browsers.
