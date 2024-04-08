php-test

- Test coverage. Write unit tests.
- env and env example missing (only for the sake of task, We will not be committing that anywhere)
- Add a logout
- Redirect to login on page posts. ‘/‘ redirect should point to login if user is not authenticated
- Put a middleware on posts routes - users should only see posts or do anything with them if they are logged https://laravel.com/docs/10.x/middleware
- Remove comments from web.php or add proper ones partitioning routes to sections
- Add PostPolicy for posts according to authentication docs https://laravel.com/docs/10.x/authorization#creating-policies - nice to have
- Post->author() needs to specify foreign_key user_id
- Add use Illuminate\View\View; to controllers and specify the return. With declare strict_types=1 We will be able to catch errors on another level. That is a personal preference (and I know points against it especially in PHP), so this depends on the coding practices used in the company
- Add a @mixin Builder to Post model and include Illuminate\Database\Eloquent\Builder as this will be give more hints to Post::find($id) function used in PostsController show method
- Posts index should be user specific so the user sees only his posts
- Put an error if unauthorised user tries to see a post
- Remove use Illuminate\Contracts\Auth\MustVerifyEmail; from User model until it will be used. No point in leaving comments for later
- Sanitise input perhaps - Laravel has a way of dealing with sanitisation, but We may need to be more careful with what We let users input

======================================================================

API TASK

Pre-requisites:
- run “php artisan install:api”
- run migration for create_personal_access_tokens if not ran during previous step

Add api_token assigned to user via migration (I can see it was already done), We can also go for a cookie user got during authentication, but api_token will let user get our data from external sources without the need to log in at all times, or without compromising cookie hijack. For that it is best to check the docs for https://laravel.com/docs/11.x/sanctum as Sanctum is designed with SPA authentication in mind.

For this task I have used Laravel Sanctum for authentication. https://laravel.com/docs/11.x/sanctum as I believe it has a good way of solving SPA
For all api requests I was using Postman https://www.postman.com/downloads/postman-agent/

To use Sanctum We need to log in as a user to populate personal_access_tokens. I called /api/auth/login with parameters [email=test@test.com, password=password]. The response token needs to be copied to all api requests and needs to be put into Authorisation as Bearer Token.

With that in mind, We can easily call /api/posts and receive all posts written by a user. I understand that this wasn’t a requirement to limit the posts, but it comes in handy to limit posts visibility and was quite fun to write. Especially that I did the same for previous task for safety reasons.
We can call api/post/{postId} in the api and this time I decided to give the logged in users the ability to view posts that do not belong to them.

There is a disparity with the controllers I used for the Api, since I created an ApiController and it serves posts, as for the existing model Post for api requests (judged by the class it extends it was meant to serve api requests for posts to make data to json) I decided to go with the proposed solution. I would never use two separate ways  to get these results in production, but I wanted to do it for the sake of reminding myself of Laravel routing and maybe show other solution.

I decided to paginate the posts in the api request by 5 posts per request. To go to the second page of posts simply go to /api/posts?page=2 url.

I decided not to leave AppServiceProvider empty.

I would not release code without unit tests (unless that is the company policy), but decided to do it, as didn't have remaining time for writing tests.