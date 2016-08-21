# Forums (WIP)
MCVerge forum layout

**Page Layout**

* Home
* Forums
 * Categories
  * **Administration**
   * News
   * Development Updates
   * Wiki Discussion
  * **Community**
   * Indroductions
   * General Discussion
   * Bug and issue reports
   * Community Help
  * **Servers**
   * Development Help
   * Server discussion
* Download
* GitHub
* Members
 * Community
 * Staff
* Wiki
* Profile (Drop Down - not logged in)
 * Login
 * Register
* Profile (Drop Down - Logged in)
 * Account Settings
 * Change Password

**Database Layout**

Screen shot = http://prntscr.com/7bc9fg

| Name  | Type | Extra |
| ------------- | ------------- | ------------- | 
| UserID | Int (25) | Auto Increment |
| Username | Varchar (65) | N/A |
| Password | Varchar (32) | N/A |
| EmailAddress | Varchar (255) | N/A |
| Rank | Text | N/A |
| Activation | Varchar (300) | N/A |
| Status | enum('0', '1') | N/A |
