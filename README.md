# Izix Test Project
## Requirements 
1. It lists articles (title, author, and content) and displays their details, as well as the possibility
for visitors to leave a comment.
2. The sales team would like to know how often people start writing a comment but then end
up deleting it before publication.
Track this data.

## Setup 
1. Clone the git repository
2. Run ```composer install```
3. Run ```php artisan migrate --seed```

## Usage
After running the seeder, the default homepage displays a paginated list of articles, 
with each article having its own dedicated page with comments.
The comments are listed in descending order of creation, the most recent ones being on top.
If you login/register as a new user, you'll see two tables, containing the list of published and unpublished
comments.
If a logged in user leaves a comment, that link is stored in the database.

Note: The article pages support both light and dark modes. 

## Approach
Create three models - 
1. User (Laravel default)
2. Article - Belongs to User
3. Comment - Belongs to User (nullable for anonymous/blank comments), Belongs to Article

The approach to track unpublished comments would be to have a "published" boolean field in the Comment model. A Livewire component for comments would be a good tradeoff to manage this interaction.
### Pros

1. This would allow us to only show published comments, but keep a track of unpublished comments, along with the comment itself.
2. This also allows for future requests from the sales team to track information like whether unpublished comments are from logged in users or not.
3. Even if a user closes a tab, we are still able to record the comment, or the attempt to comment
### Cons

1. Higher storage penalty for unpublished comments, however this can be mitigated using a scheduled task to clean up old unpublished comments
2. Using Livewire will only store the last edited version of the comment, and not the entire history of the specific comment
3. If a user backspaces their comment, we lose the content of their comment, while only retaining a log of their attempted comment
## Possible improvements
1. Add a Gate/Policy check to ensure only sales team can view the list of comments
2. Add a schedule task to clean up old unpublished comments
3. Using ```wire.model.blur``` to be less intensive on the database
4. Add more testing 
