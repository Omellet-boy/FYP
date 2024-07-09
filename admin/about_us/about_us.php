<style>
    body 
	{
		font-family: Arial, sans-serif;
		margin: 0;
		padding: 0;
		background-color: whitesmoke;
	}

	header 
	{
		background-color: #f0f0f0;
		padding: 1em;
		text-align: center;
	}

	nav ul 
	{
		list-style: none;
		margin: 0;
		padding: 0;
		display: flex;
		justify-content: space-between;
	}

	nav li 
	{
		margin-right: 20px;
	}

	main 
	{
		display: flex;
		flex-direction: column;
		align-items: center;
		padding: 2em;
	}

	section 
	{
		background-color: #fff;
		padding: 2em;
		margin-bottom: 20px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	}

	h1 
	{
		font-size: 30px;
		margin-top: 0;
		text-align: center;
	}

	p 
	{
		margin-bottom: 20px;
	}

	footer 
	{
		background-color: #f0f0f0;
		padding: 1em;
		text-align: center;
		clear: both;
	}
	.team-wrap 
	{
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
	}

	.team-member 
	{
		background-color: #f9f9f9;  
		margin: 50px;
		height: 700px;
		width: 250px;
		text-align: center;
		border:2px solid #C6F7D0;
		border-radius: 5px;
	}

	.team-member img 
	{
		width: 60%; 
		height: 60%;
		object-fit: cover;
		border-radius: 50%;
		margin-bottom: 10px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	}

	.team-member h3 
	{
		font-size: 18px;
		margin-top: 0;
	}

	.team-member p
	{
		font-size: 16px;
		margin-bottom: 20px;
	}

	.container 
	{
		max-width: 1000px;
		margin: 40px auto;
		padding: 20px;
		background-color: #f9f9f9;
		border: 1px solid #ddd;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		margin-bottom: 100px;
		border-radius:  5px;
	}

	h3 
	{
		font-size:30px;
		text-align: center;
	}

	.card-body {
		background-color: #fcf9e8; /* very light yellow */
		padding: 30px;
		animation: pulse 3s infinite;
	}
    @keyframes pulse {
  		0% {
    	color: #007bff; 
  		}
  		25% {
    	color: #0069d9; 
  		}
  		50% {
    	color: #0056b3; 
 		}
  		75% {
    	color: #0047a6; 
  		}
  		100% {
    	color: #007bff;
  		}
	}
	#about-us {
		background-color: #edfaef;	
		}
	
</style>



<div class="card card-outline card-primary rounded-0 shadow">
	<div class="card-header">
		<h3 class="card-title">About Us</h3>
	</div>

	<div class="card-body">
	<main>
        <section id="about-us">
        <div class="container">
            <h1>About Us</h1>
            <p>FLY FLY Money Bookkeeping is an accounting website built to streamline all needs with easy accessibility.</p>
            <p>We have been a given an oppurtinity by our assigned lecturer to build a website for our final year project and decided to go with a website to cater the needs of business aspect. </p>
            <p>With a three man team, we aimed to pursue a simple yet efficient way to keep track of accounts for businesses to use.</p>
        </div>
        <hr>
        <h3>Team Management</h3>
            <div class="team-wrap"> 
                <div class="team-member">
				<img src="\FYP\uploads\Marcus.jpg" alt="Marcus"> 
                    <h3>Marcus Young Tuck Meng</h3> 
                    <p>CEO & Lead programmer</p> 
                    <p>Marcus was the one that inspired us to start an accounting website, He also was responsible in coordinating the other team members. Not to mention,He was responsible in setting up the database.</p> 
                </div> 
                <div class="team-member">
				<img src="\FYP\uploads\Wanna.jpg" alt="Wanna"> 
                    <h3>Wanna Naing</h3> 
                    <p>Programmer / Designer</p> 
                    <p>Wanna was responsible for the entire design aspect of the website. This included creating the overall aesthetic, user interface, and user experience design to ensure the site was visually appealing and easy to navigate.</p> 
                </div> 
                <div class="team-member">
				<img src="\FYP\uploads\Jeevan.jpg" alt="Jeevan"> 
                    <h3>Jeevan Kumar A/L Magasan</h3> 
                    <p>Programmer</p> 
                    <p>Jeevan was there to assist wherever was needed whether it included the design or database.He offered fresh new eyes for the website and was helping on the outside matters.</p> 
                </div> 
        </section>
    </main>
		</div>
	</div>
</div>

