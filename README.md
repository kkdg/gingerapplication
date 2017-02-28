# gingerapplication
Applicant name : Degi Kwag
email : code at skyaperture dot com

## API list: 

1. /api/person/name/[name] : This api end will return person's information including groups he/she belongs to. [name] is variable.
2. /api/person/email/[email] : This end will return person's information whose email is matched against given one.
3. /api/group/name/[name] : This end will return group's information including members' information.
4. /api/address/list : This will list the whole addressbook
5. /api/address/group/[name] : This end will add a group to addressbook. You must provide a group name which already exists in DB
6. /api/address/person/[name] : This end will add a person to addressbook. You must provide a person name which already exists in DB

## Design for finding a person with email : 
1. Set given email string to lowercase (strtolower)
2. Fetch Person collection from database 
3. Find position of the email string within each entity's email of fetched collection. (strpos)
4. If matches found, return them otherwise send appropriate notice.


Note : I created simple MVC framework without V (view) for brevity's sake. I also used Session as a DB for this framework. However, I think I misunderstood your requirements a little bit in some way like "person collection, group collection are separate entities with address book". So, with API, you would add person, group to addressbook, however there is no way of adding new person or group to Session DB at the first place. If you allow me a little more time, I would add View to this framework so HTML form will help to fill all the information a person or a group would need to be added. 
One more thing to note, since I ran out of time, I couldn't approach this whole thing with TDD, which returend as a technical debt. I failed big time with ex post facto test using PHPUnit, and I think it would substantially consume more time, so I decided to stop here.
I tested and they worked fine, however phpunit testing wasn't complete.

notice: you need to enable apache2 rewrite module.

Thank you for your time!

