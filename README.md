## RateRing

# API Authentication

API_USER : apiusername
API_PASSWORD : LNy3uNOIUUiQ5p9W9Mk2haTkdwHR

# Profiles

    GET : https://raterin.ga/api/auth/profile/{pid}
    Variable :
      {Pid} : profile id
    Request: 
       Nothing
    Function :
      Get profile info 
    Response :
{
    "id": 1,
    "full_name": "Mark Saeid",
    "username": "marksaeid",
    "birthday": "7/5/2000",
    "gender": "male",
    "rating": "0",
    "email": "marksaeid10@gmail.com",
    "phone": "01227887286",
    "point": "0",
    "pp": null,
    "bio": null,
    "verified": 0,
    "created_at": "Nov Sun, 2020 12:11 AM",
    "updated_at": "Nov Sun, 2020 12:11 AM"
}


    POST : https://raterin.ga/api/auth/profile/pp
     Variable :
    Nothing
     Request: 
       'pp' => 'mimes:jpeg,jpg,png,gif|required|max:10000|unique:users'
     Function :
      Upload profile picture 
    Response :
{
    "url": "http://www.raterin.ga/profile/pp/1/9389742E4486556mark.jpg"
}



    POST : https://raterin.ga/api/auth/profile/bio
     Variable :
    Nothing
     Request: 
      'bio' => 'required|string|between:4,180',
     Function :
      Upload bio
    Response :
{
    "bio": "here we go"
}


# Post


    GET :  https://raterin.ga/api/auth/posts 
     Variable :
      Nothing
     Request: 
       Nothing
     Function :
      Get all Post 
     Response :
[
    {
        "id": 1,
        "publisher_id": "1",
        "post_rating": "0",
        "post_text": "text test",
        "post_link": "https://www.facebook.com/mark.saeid.90/posts/792557988243421",
        "post_image": "http://www.raterin.ga/post/image/409301236180T66markintro.jpg",
        "post_video": "http://www.raterin.ga/post/video/7167E7974673532h.mp4",
        "created_at": "Nov Sun, 2020 12:11 AM",
        "updated_at": "Nov Sun, 2020 12:11 AM"
    },
    {
        "id": 11,
        "publisher_id": "1",
        "post_rating": "0",
        "post_text": "text test",
        "post_link": null,
        "post_image": "http://www.raterin.ga/post/image/4321914664Z1466markpps.jpg",
        "post_video": null,
        "created_at": "Nov Sun, 2020 12:11 AM",
        "updated_at": "Nov Sun, 2020 12:11 AM"
    },
    {
        "id": 21,
        "publisher_id": "1",
        "post_rating": "0",
        "post_text": "text test",
        "post_link": null,
        "post_image": null,
        "post_video": null,
        "created_at": "Nov Sun, 2020 12:11 AM",
        "updated_at": "Nov Sun, 2020 12:11 AM"
    }
]


    GET :  https://raterin.ga/api/auth/posts/trend
    Variable :
      Nothing
     Request: 
       Nothing
     Function :
      Get trend Posts if it get more than 3 stars
     Response :
[
    {
        "id": 1,
        "publisher_id": "1",
        "post_rating": "3.4",
        "post_text": "text test",
        "post_link": "https://www.facebook.com/mark.saeid.90/posts/792557988243421",
        "post_image": "http://www.raterin.ga/post/image/409301236180T66markintro.jpg",
        "post_video": "http://www.raterin.ga/post/video/7167E7974673532h.mp4",
        "created_at": "Nov Sun, 2020 12:11 AM",
        "updated_at": "Nov Sun, 2020 12:11 AM"
 
    }
]


    GET :  https://raterin.ga/api/auth/posts/videos
    Variable :
      Nothing
     Request: 
       Nothing
     Function :
      Get videos Posts 
     Response :
[
    {
        "id": 1,
        "publisher_id": "1",
        "post_rating": "3.4",
        "post_text": "text test",
        "post_link": Null,
        "post_image": Null,
        "post_video": "http://www.raterin.ga/post/video/7167E7974673532h.mp4",
        "created_at": "Nov Sun, 2020 12:11 AM",
        "updated_at": "Nov Sun, 2020 12:11 AM"
 
    }
]


    GET :  https://raterin.ga/api/auth/{pid}/posts
     Variable :
      {pid} : profile id
     Request: 
       Nothing
     Function :
      Get Profile Posts 
   Response :
[
    {
        "id": 1,
        "publisher_id": "1",
        "post_rating": "0",
        "post_text": "text test",
        "post_link": "https://www.facebook.com/mark.saeid.90/posts/792557988243421",
        "post_image": "http://www.raterin.ga/post/image/409301236180T66markintro.jpg",
        "post_video": "http://www.raterin.ga/post/video/7167E7974673532h.mp4",
        "created_at": "Nov Sun, 2020 12:11 AM",
        "updated_at": "Nov Sun, 2020 12:11 AM"
    },
    {
        "id": 11,
        "publisher_id": "1",
        "post_rating": "0",
        "post_text": "text test",
        "post_link": null,
        "post_image": "http://www.raterin.ga/post/image/4321914664Z1466markpps.jpg",
        "post_video": null,
        "created_at": "Nov Sun, 2020 12:11 AM",
        "updated_at": "Nov Sun, 2020 12:11 AM"
    },
    {
        "id": 21,
        "publisher_id": "1",
        "post_rating": "0",
        "post_text": "text test",
        "post_link": null,
        "post_image": null,
        "post_video": null,
        "created_at": "Nov Sun, 2020 12:11 AM",
        "updated_at": "Nov Sun, 2020 12:11 AM"
    }
]

    GET :  https://raterin.ga/api/auth/{pid}/posts/{id}
     Variable :
      {pid} : profile id
      {id} : post id
     Request: 
       Nothing
     Function :
      Get Specific Post 
   Response : {
    "id": 1,
    "publisher_id": "1",
    "post_rating": "0",
    "post_text": "text test",
    "post_link": "https://www.facebook.com/mark.saeid.90/posts/792557988243421",
    "post_image": "http://www.raterin.ga/post/image/409301236180T66markintro.jpg",
    "post_video": "http://www.raterin.ga/post/video/7167E7974673532h.mp4",
    "created_at": "Nov Sun, 2020 12:11 AM",
    "updated_at": "Nov Sun, 2020 12:11 AM"}

     POST :  https://raterin.ga/api/auth/posts/create
     Variable :
       Nothing
      Request: 
       'post_text' => 'string',
        'post_link' => 'string|unique:posts',
        'post_image' => 'mimes:jpeg,jpg,png,gif|max:10000|unique:posts',
       'post_video'  => 'mimes:mp4,mov,ogg,qt |max:20000|unique:posts',     
     Function :
      Create A Post 
    Response : 
{
    "message": "posted successfully ",
    "post": {
        "post_text": "text test",
        "post_link": "https://www.facebook.com/mark.saeid.90/posts/792557988243421",
        "post_image": "http://www.raterin.ga/post/image/409301236180T66markintro.jpg",
        "post_video": "http://www.raterin.ga/post/video/7167E7974673532h.mp4",
        "post_rating": "0",
        "publisher_id": 1,
        "updated_at": "Nov Sun, 2020 11:11 AM",
        "created_at": "Nov Sun, 2020 11:11 AM",
        "id": 1
    }
}

     POST :  
    https://raterin.ga/api/auth/posts/{pid}/delete

     Variable :
    {pid} : post id
       Nothing
     Request: 
     No Request
     Function :
      remove A Post 
    Response : 
return response()->json([
    'message' => 'deleted successfully ',
], 201);

# Status


    GET :  https://raterin.ga/api/auth/status
     Variable :
      Nothing
     Request: 
       Nothing
     Function :
      Get all Status 
     Response :
[
    {
        "id": 1,
        "publisher_id": "1",
        "status_rating": "0",
        "status_text": "text test",
        "status_image": "http://www.raterin.ga/post/image/409301236180T66markintro.jpg",
        "status _video": "http://www.raterin.ga/post/video/7167E7974673532h.mp4",
        "created_at": "Nov Sun, 2020 12:11 AM",
        "updated_at": "Nov Sun, 2020 12:11 AM"
    },
    {
        "id": 11,
        "publisher_id": "1",
        "status_rating": "0",
        "status_text": "text test",
        "status_image": "http://www.raterin.ga/post/image/4321914664Z1466markpps.jpg",
        "status_video": null,
        "created_at": "Nov Sun, 2020 12:11 AM",
        "updated_at": "Nov Sun, 2020 12:11 AM"
   
    }
]


    GET :  https://raterin.ga/api/auth/{pid}/status 
    Variable :
      {Pid} : profile id
     Request: 
       Nothing
     Function :
      Get profile Status
     Response :
[
    {
        "id": 11,
        "publisher_id": "2",
        "status_rating": "0",
        "status_text": "text test",
        "status_image": "http://www.raterin.ga/post/image/4321914664Z1466markpps.jpg",
        "status_video": null,
        "created_at": "Nov Sun, 2020 12:11 AM",
        "updated_at": "Nov Sun, 2020 12:11 AM"
   
    }
]

    GET :  https://raterin.ga/api/auth/{pid}/status/{id}
    Variable :
     {id}:status id
     {Pid}:profile id
     Request: 
       Nothing
     Function :
      Get Specific Status 
     Response :
   {
        "id": 1,
        "publisher_id": "1",
        "post_rating": "3.4",
        "post_text": "text test",
        "post_link": Null,
        "post_image": Null,
        "post_video": "http://www.raterin.ga/post/video/7167E7974673532h.mp4",
        "created_at": "Nov Sun, 2020 12:11 AM",
        "updated_at": "Nov Sun, 2020 12:11 AM"
 
    }


  

     POST :  https://raterin.ga/api/auth/status/create
     Variable :
       Nothing
     Request: 
    'status_text' => 'string',
    'status_image' => 'mimes:jpeg,jpg,png,gif|max:10000|unique:status',
     'status_video'  => 'mimes:mp4,mov,ogg,qt |max:20000|unique:status',
     Function :
      Create A Status
    Response : 
{
    "message": "posted successfully ",
    "status": {
        "status_rating": "0",
        "publisher_id": 1,
        "status_image": null,
        "status_text": null,
        "status_video": null,
        "updated_at": "Nov Sun, 2020 12:11 PM",
        "created_at": "Nov Sun, 2020 12:11 PM",
        "id": 1
    }
}


     POST :  https://raterin.ga/api/auth/{sid}/status/rate
       Variable :
       Nothing
     Request: 
     ‘status_rating’
     Function :
      Rate A Status
    Response : 
{
'message' => 'Rated successfully ',
}

     POST :  https://raterin.ga/api/auth/status/{sid}/delete

     Variable :
      {sid} : status id
       Nothing
     Request: 
       No Request
     Function :
      remove A status 
    Response : 
return response()->json([
    'message' => 'deleted successfully ',
], 201);


# comments


    GET : https://raterin.ga/api/auth/posts/{id}/comments
     Variable :
       {id} : post id
     Request: 
       Nothing
     Function :
      Get all comments on a post 
Response :
[
{
        "comment_text": "hi there",
        "post_rate": "5",
        "publisher_id": 1,
        "post_id": "1",
        "updated_at": "Nov Sun, 2020 12:11 PM",
        "created_at": "Nov Sun, 2020 12:11 PM",
        "id": 1
},{
        "comment_text": "hi there",
        "post_rate": "4",
        "publisher_id": 3,
        "post_id": "1",
        "updated_at": "Nov Sun, 2020 12:11 PM",
        "created_at": "Nov Sun, 2020 12:11 PM",
        "id": 1
},

]

    GET : https://raterin.ga /api/auth/posts/{id}/comments/{cid}
     Variable :
       {id} : post id
       {cid} : comment id
     Request: 
       Nothing
     Function :
      Get specific comments on a post 

Response :
{
    "id": 11,
    "publisher_id": "1",
    "comment_text": "hi there",
    "post_id": "1",
    "post_rate": "4",
    "created_at": "Nov Sun, 2020 12:11 AM",
    "updated_at": "Nov Sun, 2020 12:11 AM"
}

     POST :  https://raterin.ga /api/auth/posts/{id}/comments/create
     Variable :
       {id} : post id
     Request: 
     'comment_text' => 'string',
      'post_rate' => 'required|numeric|min:1|max:5',
     Function :
      Create A Comment on a Post 
Response : 
{
    "message": "posted successfully ",
    "comment": {
        "comment_text": "hi there",
        "post_rate": "5",
        "publisher_id": 1,
        "post_id": "1",
        "updated_at": "Nov Sun, 2020 12:11 PM",
        "created_at": "Nov Sun, 2020 12:11 PM",
        "id": 1
    }
}


     POST :  https://raterin.ga/api/auth/posts/{pid}/comments/{cid}/delete
     Variable :
      {pid} : post id
      {cid} : coment id
       Nothing
     Request: 
       No Request
     Function :
      remove A coment 
    Response : 
return response()->json([
    'message' => 'deleted successfully ',
], 201);




# Connection

    GET : https://raterin.ga/api/auth/{pid}/connection
     Variable :
       {pid} : profile id
     Request: 
       Nothing
     Function :
      Get all friends for a profile
 [
    "Connection": {
        "to_id": "2",
        "from_id": 1,
        "status": "true",
        "updated_at": "2020-09-25T12:18:35.000000Z",
        "created_at": "2020-09-25T12:18:35.000000Z",
        "id": 1
    }
]


    GET : https://raterin.ga/api/auth/{pid}/connection/sent
     Variable :
       {pid} : profile id
     Request: 
       Nothing
     Function :
      Get all sent friend Request for a profile 
     Response:
[
    "Connection": {
        "to_id": "2",
        "from_id": 1,
        "status": "pending",
        "updated_at": "2020-09-25T12:18:35.000000Z",
        "created_at": "2020-09-25T12:18:35.000000Z",
        "id": 1
    }
]


    GET : https://raterin.ga/api/auth/{pid}/connection/received
     Variable :
       {pid} : profile id
     Request: 
       Nothing
     Function :
      Get all received friend Request for a profile 
     Response :
[
    "Connection": {
        "to_id": "1",
        "from_id": 2,
        "status": "pending",
        "updated_at": "2020-09-25T12:18:35.000000Z",
        "created_at": "2020-09-25T12:18:35.000000Z",
        "id": 1
    }
]




    POST :  https://raterin.ga/api/auth/connection/add
     Variable :
       Nothing
     Request: 
       to_id
     Function :
      Send a Friend Request 
    Response : 
{
    "message": "Connection Sent successfully ",
    "Connection": {
        "to_id": "2",
        "from_id": 1,
        "status": "pending",
        "updated_at": "2020-09-25T12:18:35.000000Z",
        "created_at": "2020-09-25T12:18:35.000000Z",
        "id": 1
    }
}


    POST :  https://raterin.ga/api/auth/connection/{cid}/status
     Variable :
       Nothing
     Request: 
       status {true or false}
     Function :
      Response to a Friend Request 
    Response : 
{
'message' => 'Done Successfully ',
'status' => ‘true’
}


    POST :  https://raterin.ga/api/auth/connection/{cid}/remove
     Variable :
       Nothing
     Request: 
       Nothing
     Function :
      Remove a Connection 
    Response : 
{
'message' => 'Done Successfully ',
'status' => 'false'
 }


# Rating
    GET : https://raterin.ga/api/auth/{pid}/rate
     Variable :
       {pid} : profile id
     Request: 
       Nothing
     Function :
      Get all Stars for a profile 
    Response : 
[
    {
        "id": 1,
        "from_id": "1",
        "to_id": "2",
        "rate": "5",
        "created_at": "2020-09-25T12:25:06.000000Z",
        "updated_at": "2020-09-25T12:25:06.000000Z"
    },
    {
        "id": 11,
        "from_id": "1",
        "to_id": "2",
        "rate": "5",
        "created_at": "2020-09-25T12:25:08.000000Z",
        "updated_at": "2020-09-25T12:25:08.000000Z"
    }
]





    GET : https://raterin.ga/api/auth/{pid}/rate/sent 
     Variable :
       {pid} : profile id
     Request: 
       Nothing
     Function :
      Get all Stars sent from a profile 
    Response :
{
    "3": {
        "id": 31,
        "from_id": "1",
        "to_id": "2",
        "rate": "5",
        "created_at": "2020-09-25T12:25:25.000000Z",
        "updated_at": "2020-09-25T12:25:25.000000Z"
    }
}



    GET : https://raterin.ga/api/auth/{pid}/rate/received  
     Variable :
       {pid} : profile id
     Request: 
       Nothing
     Function :
      Get all Stars Received from a profile 
     Response : 
{
    "3": {
        "id": 31,
        "from_id": "2",
        "to_id": "1",
        "rate": "5",
        "created_at": "2020-09-25T12:25:25.000000Z",
        "updated_at": "2020-09-25T12:25:25.000000Z"
    }
}

    POST :  https://raterin.ga/api/auth/rate/add
     Variable :
       Nothing
     Request: 
     'to_id' => 'required|string',
      'rate' => 'required|numeric|min:1|max:5',
     Function :
      Send a Star
    Response : 
{
    "message": "Done Successfully "
}


# Login

    POST :  https://raterin.ga/api/auth/login
     Variable :
       Nothing
     Request: 
       email
       password
     Function :
      Login 
Response :
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC93d3cucmF0ZXJpbi5nYVwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTYwNDIyODA1OCwiZXhwIjoxNjA0NTI4MDU4LCJuYmYiOjE2MDQyMjgwNTgsImp0aSI6IkdpNjFJejhhQWVVdGZYR2UiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.lbmo9WrLGNcRm5nQEcAGQgtmsOhV9bbohA1Kdk0P2_Q",
    "token_type": "bearer",
    "expires_in": 300000,
    "user": {
        "id": 1,
        "full_name": "Mark Saeid",
        "pp": null,
        "bio": null,
        "point": "0",
        "username": "marksaeid",
        "birthday": "7/5/2000",
        "gender": "male",
        "rating": "0",
        "email": "marksaeid10@gmail.com",
        "phone": "01227887286",
        "verified": 0,
        "created_at": "Nov Sun, 2020 12:11 AM",
        "updated_at": "Nov Sun, 2020 12:11 AM"
    }
}


    POST :  https://raterin.ga/api/auth/register
     Variable :
       Nothing
     Request: 
      'email' => 'required|string|email|max:100|unique:users|regex:/(.+)@(.+)\.(.+)/i',
      'password' => 'required',
       'min:6',
       'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
       'confirmed',
        'full_name' => 'required|string|between:4,40',
        'username' => 'required|string|between:6,12|unique:users',
        'birthday' => 'required|string|between:2,18',
        'gender' => 'required|string|between:3,8',
        'phone' => 'required|string|between:10,16|unique:users',
     Function :
      Signup 
    Response :
{
    "message": "User successfully registered",
    "user": {
        "email": "marksaeid10@gmail.com",
        "full_name": "Mark Saeid",
        "username": "marksaeid",
        "birthday": "7/5/2000",
        "gender": "male",
        "phone": "01227887286",
        "rating": "0",
        "point": "0",
        "verified": false,
        "updated_at": "Nov Sun, 2020 10:11 AM",
        "created_at": "Nov Sun, 2020 10:11 AM",
        "id": 1
    }
}


    POST :  https://raterin.ga/api/auth/logout
     Variable :
       Nothing
     Request: 
       Pass Access token as Bearer token
     Function :
      Logout 
     Response : 
{
    "message": "User successfully signed out"
}
  
  
    POST :  https://raterin.ga/api/auth/remove
     Variable :
       Nothing
     Request: 
       No 
     Function :
      Remove account
     Response : 
return response()->json([
    'access_token' => 'deleted successfully',
] ,200);




    POST :  https://raterin.ga/api/auth/refresh
     Variable :
       Nothing
     Request: 
       Pass Access token as Bearer token
     Function :
      Refresh Token 
     Response : 
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9yYXRlcmluZy5oZXJva3VhcHAuY29tXC9hcGlcL2F1dGhcL3JlZnJlc2giLCJpYXQiOjE2MDEwMzQ4NTgsImV4cCI6MTYwMTMzNzA4NiwibmJmIjoxNjAxMDM3MDg2LCJqdGkiOiJ1TUdsV1U3eXhFUlZlWGZTIiwic3ViIjoxLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.E_J1WZ8KZVXj6M2es4pCRlx9Dp57r9W3TT1hkppDQoU",
    "token_type": "bearer",
    "expires_in": 300000,
    "user": {
        "id": 1,
        "full_name": "Mark Saeid",
        "username": "marksaeid",
        "token": null,
        "birthday": "7/5/2000",
        "gender": "male",
        "rating": "5",
        "email": "marksaeid10@gmail.com",
        "phone": "01227887286",
        "created_at": "2020-09-24T07:23:40.000000Z",
        "updated_at": "2020-09-25T12:25:25.000000Z"
    }
}






 
    GET : https://raterin.ga/api/auth/profile
     Variable :
      Nothing
     Request: 
      Pass Access token as Bearer token
     Function :
      Get Current User profile info 
     Response : 
{
    "id": 1,
    "full_name": "Mark Saeid",
    "username": "marksaeid",
    "token": null,
    "birthday": "7/5/2000",
    "gender": "male",
    "rating": "5",
    "email": "marksaeid10@gmail.com",
    "phone": "01227887286",
    "created_at": "2020-09-24T07:23:40.000000Z",
    "updated_at": "2020-09-25T12:25:25.000000Z"
}


# Report

     Post: https://www.raterin.ga/api/auth/report/create
     Variable :
      Nothing
     Request: 
     'post_id' => 'string',
     'profile_id' => 'string',
     'status_id' => 'string',
     'about' => 'required|string',
     'screen_shot' => 'mimes:jpeg,jpg,png,gif|max:10000|unique:posts',
     'reason' => 'required|string',

     Function :
      Report on a post or profile or status 
     Response : 
{
    "message": "posted successfully ",
    "report": {
        "post_id": "1",
        "about": "Self Injuring",
        "reason": "bla bla bla",
        "publisher_id": 1,
        "profile_id": null,
        "status_id": null,
        "screen_shot": null,
        "status": "pending",
        "updated_at": "Nov Sun, 2020 12:11 PM",
        "created_at": "Nov Sun, 2020 12:11 PM",
        "id": 1
    }
}


# Interaction
    GET : https://raterin.ga/api/auth/{pid}/views/add
     Variable :
       {pid} : post id
     Request: 
       Nothing
     Function :
     Add post view
     Response : 
[
    {
'message' : 'added successfully ',

    }
]

    GET : https://raterin.ga/api/auth/{pid}/views 
     Variable :
       {pid} : profile id
     Request: 
       Nothing
     Function :
      Get post views 
    Response :
 {
    'views' : “1”
}


    GET : https://raterin.ga/api/auth/{pid}/impression  
     Variable :
       {pid} : post id
     Request: 
       Nothing
     Function :
      Get Post Impression
     Response : 
  {
    “impression” : “1”
}


    GET : https://raterin.ga/api/auth/{pid}/notinterested  
     Variable :
       {pid} : post id
     Request: 
       Nothing
     Function :
      Get Post Impression
    Response : 
{
'message' : 'done'
}


# Transaction

    GET : https://raterin.ga/api/auth/{id}/tip/all
     Variable :
       {id} : profile id
     Request: 
       Nothing
     Function :
     All tip sent and recived
    Response : 
[
    {
“points” : '400',
“from_id” : 1,
“to_id” : 2,
“post_id” : 4,

    }
]

    GET : https://raterin.ga/api/auth/{id}/sent 
     Variable :
       {id} : profile id
     Request: 
       Nothing
     Function :
     All tip sent
    Response : 
[
    {
“points” : '400',
“from_id” : 1,
“to_id” : 2,
“post_id” : 4,

    }
]


    GET : https://raterin.ga/api/auth/{id}/received  
     Variable :
       {id} : profile id
     Request: 
       Nothing
     Function :
     All tip recived
    Response : 
[
    {
“points” : '400',
“from_id” : 1,
“to_id” : 2,
“post_id” : 4,

    }
]


    GET : https://raterin.ga/api/auth/{pid}/notinterested  
     Variable :
       {pid} : post id
     Request: 
       Nothing
     Function :
     All tip sent to post
    Response : 
[
    {
“points” : '400',
“from_id” : 1,
“to_id” : 2,
“post_id” : 4,

    }
]

    Post : https://raterin.ga/api/auth/{pid}/posts/tip/send
 
     Variable :
       {pid} : post id
     Request: 
       ‘point’
     Function :
     All tip sent to post
    Response : 
{
    "message": "sent successfully ",
    "transaction": {
        "post_id": "1",
        "to_id": "2",
        "from_id": "3",
        "points": "3",
        "id": 1
    }
}
