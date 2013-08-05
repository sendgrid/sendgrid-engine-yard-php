# ###################################		before_migrate.rb		###################################
#   Runs a Shell command that creates database tables if they do not already exist
# #####################################################################################################

#   Engine Yard uses Chef to configure the enviroment.
#   `before_migrate` is an Engine Yard deploy hook that runs before Ruby database migrations. As we're using PHP those aren't super handy for us.
#   We load our database before migrations are expected, so after_migrate (and beyond) will have the dbs.
#   (https://support.cloud.engineyard.com/entries/21016568-Use-Deploy-Hooks)
run!("cat #{release_path}/db/create.sql | mysql #{app}")