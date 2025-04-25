# ![CompBioAgent](https://github.com/interactivereport/CompBioAgent/blob/main/CompBioAgent_logo.png)

Live Demo: https://apps.bxgenomics.com/compbioagent/

Question: https://bioinforx.com/contact



<h2>Documentations</h2>

    
<p>Last Updated: March 8, 2025 by Derrick Cheng</p>

<p>
To set up CompbioAgent on your own server, some familiarity with Linux is necessary. If you're new to Linux, we're happy to host the dataset for you.
					Please <a href='https://bioinforx.com/contact' target='_blank'><strong>contact us</strong></a> for details.</p>

<h2>Requirements</h2>

| Category     | Details |
| :---         | :---     |
| Operating System: | RHEL 7 or RHEL 9 (CompbioAgent has not been tested on other operating systems) |
| Hardware Requirement: | At least 10GB free space available for web applications and database. Additional space may be needed for your dataset files. |
| Webserver Requirement: | Apache 2.4.X, PHP 7.4 or 8.4 (CompbioAgent has not been tested with other PHP versions) |
| Databases: | MySQL/MariaDB |
| Other Applications: | <a href='https://github.com/interactivereport/cellxgene_VIP' target='_blank'>Cellxgene VIP</a>, R, Python |
                
<br/>
<h3>Apache, MariaDB/MySQL, PHP</h3>
<p>Please follow <a href='https://docs.bxgenomics.com/server_setup/' target='_blank'>this link</a> to set up the application server.</p>

<br/>


<h3>Apache</h3>
<p>
Prepare a system user for Apache. This user is created by default when installing Apache (usually apache). We assume web application files will be placed in the following directories:
</p>

<pre>
#Web Directory:
/var/www/html/

#Work, log directory
/var/www/html/compbioagent_share/


#Web Application
/var/www/html/compbioagent/

#Ensure the folders have the correct permissions:
chown -R <span style='color:red;'>apache</span>:<span style='color:red;'>apache</span> /var/www/html/compbioagent_share/
chown -R <span style='color:red;'>apache</span>:<span style='color:red;'>apache</span> /var/www/html/compbioagent/

chmod -R ug+rw /var/www/html/compbioagent_share/
chmod -R ug+rw /var/www/html/compbioagent/
</pre>

<br/>
<h3>Web Application</h3>
<pre>
#Download the CompbioAgent from <a href='https://github.com/interactivereport/CompBioAgent' target='_blank'>GitHub</a>. We need the <span style='color:red;'>webapp/</span> folder.</li>
cd /tmp
git clone https://github.com/interactivereport/CompBioAgent.git
rsync -avr /tmp/CompBioAgent/webapp/ /var/www/html/compbioagent/
rm -Rf /tmp/CompBioAgent/



#After copying the files, the directory structure should look something like this:
/var/www/html/compbioagent/app/
/var/www/html/compbioagent/bxaf_lite/
/var/www/html/compbioagent/bxaf_setup/
</pre>


<br/>
<h3>Other Requirements</h3>
<ul>
	<li>Ensure SELinux has been disabled (<a href='https://docs.bxgenomics.com/server_setup/RHEL_9.php#selinx' target='_blank'>Link</a>).</li>
</ul>




<br/>
<h3>MySQL/MariaDB</h3>
<p>Create a user within the MySQL system.</p>
<pre>

#Create a user within the MySQL system:
mysql -u root -p
CREATE USER <span style='color:red;'>mysql_user</span>@localhost IDENTIFIED BY '<span style='color:red;'>mysql_password</span>';
exit


#Create a MySQL Database
mysql -u <span style='color:red;'>mysql_user</span> -p<span style='color:red;'>mysql_password</span> -e "create database <span style='color:red;'>db_compbioagent</span>"
wget https://docs.bxgenomics.com/compbioagent/db_compbioagent.sql.gz
zcat db_compbioagent.sql.gz | mysql -u <span style='color:red;'>mysql_user</span> -p<span style='color:red;'>mysql_password</span> <span style='color:red;'>db_compbioagent</span>


#Allow the MySQL user to use the database:
GRANT ALL ON *.* TO '<span style='color:red;'>db_compbioagent</span>'@'localhost';
</pre>


<br/>
<h3>Linux Packages</h3>
<pre>
#Install curl
sudo yum install -y curl;
</pre>



<br/>
<h3>Cellxgene VIP</h3>
<p>
Install <a href='https://github.com/interactivereport/cellxgene_VIP' target='_blank'>Cellxgene VIP</a> on your server. CompBioAid will need access to the following:</p>
<ul>
   <li><a href='https://github.com/interactivereport/cellxgene_VIP/blob/master/bin/plotH5ad.sh' target='_blank'>plotH5ad.sh</a></li>
   <li><a href='https://github.com/interactivereport/cellxgene_VIP/blob/master/bin/slimH5ad.sh' target='_blank'>slimH5ad.sh</a></li>
</ul>
<p>Ensure these tools are working properly on your server.</p>


<br/>
<h3>h5ad Files</h3>
<p>Ensure your h5ad files are accessible by CompbioAgent via the file system or network drive.</p>

<br/>
<h3>LLM Resources</h3>

<p>Access one of the following Large Language Model (LLM) resources:</p>
<ol>
	<li><a href='https://platform.openai.com/docs/pricing' target='_blank'>OpenAI / ChatGPT API Key</a>: For access to GPT models.</li>
	<li><a href='https://ollama.com/' target='_blank'>Ollama Server</a>: For accessing open-source LLMs like Meta Llama, DeepSeek-R1, etc., on your server.</li>
	<li><a href='https://groq.com/pricing/' target='_blank'>Groq API Key</a>: For accessing open-source LLMs using Groq's resources.</li>
</ol>


<br/>
<h3>Config Files</h3>
<p>Adjust the configuration files in /var/www/html/compbioagent/bxaf_setup/default/. Refer to comments in the files for instructions:</p>
<ul>
<li>1-Environment.php: MySQL/MariaDB settings (username and password).</li>
<li>2-App_Language.php: Language file. Update if you prefer a different language.</li>
<li>3-Large_Language_Model.php: LLM settings (model names, API key, provider, etc.).</li>
<li>4-Disease_Database.php: Disease information and corresponding h5ad file.</li>
<li>5-Prompt.php: Prompt instruction function. Fine-tune if introducing new models or diseases.</li>
</ul>




<br/>








