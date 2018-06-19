<!doctype html>

<html>
<title>Warehouse Map</title>
<style>
	body { padding:0; margin:0; height:100%; width:100%;background-color: lightblue }
	div { font-family:arial; font-size:16px; font-weight:bold; text-align:center; }
	
</style>

<script>
var Socket;

  



</script>
<script>
// A* Pathfinding for HTML5 Canvas Tutorial
// by Christer (McFunkypants) Kaitila
// http://www.mcfunkypants.com
// http://twitter.com/McFunkypants

// Based on Edsger Dijkstra's 1959 algorithm and work by:
// Andrea Giammarchi, Alessandro Crugnola, Jeroen Beckers,
// Peter Hart, Nils Nilsson, Bertram Raphael

// Permission is granted to use this source in any
// way you like, commercial or otherwise. Enjoy!

// the game's canvas element
var canvas = null;
// the canvas 2d context
var ctx = null;
// an image containing all sprites
var spritesheet = null;
// true when the spritesheet has been downloaded
var spritesheetLoaded = false;

// the world grid: a 2d array of tiles
var world = [[]];

// size in the world in sprite tiles
var worldWidth = 9;
var worldHeight = 9;

// size of a tile in pixels
var tileWidth = 60;
var tileHeight = 60;

// start and end of path
var pathStart = [worldWidth,worldHeight];
var pathEnd = [0,0];
var currentPath = [];

// ensure that concole.log doesn't cause errors
if (typeof console == "undefined") var console = { log: function() {} };

// the html page is ready
function onload()
{
	console.log('Page loaded.');
	canvas = document.getElementById('gameCanvas');
	canvas.width = worldWidth * tileWidth;
	canvas.height = worldHeight * tileHeight;
	canvas.addEventListener("click", canvasClick, false);
	if (!canvas) alert('Blah!');
	ctx = canvas.getContext("2d");
	if (!ctx) alert('Hmm!');
	spritesheet = new Image();
	//spritesheet.src = 'https://i.imgur.com/jIaCSdL.png';
	spritesheet.src = 'https://i.imgur.com/EjrQ91J.png';
	// the image above has been turned into a data url
	// so that no external files are required for
	// this web page - useful for included in a
	// "gist" or "jsfiddle" page
	//spritesheet.src = '/mnt/media_rw/A464-88EA/New folder/spritesheet.png';
	spritesheet.onload = loaded;
	

  Socket = new WebSocket('ws://' + window.location.hostname + ':81/');

  
}

// the spritesheet is ready
function loaded()
{
	console.log('Spritesheet loaded.');
	spritesheetLoaded = true;
	createWorld();
}

// fill the world with walls
function createWorld()
{
	console.log('Creating world...');

	// create emptiness
	for (var x=0; x < worldWidth; x++)
	{
		world[x] = [];

		for (var y=0; y < worldHeight; y++)
		{
			world[x][y] = 0;
		}
	}

	// scatter some walls
	


	// calculate initial possible path
	// note: unlikely but possible to never find one...
	currentPath = [];
	while (currentPath.length == 0)
	{
		pathStart = [4,6];
		pathEnd = [4,6];
		if (world[pathStart[0]][pathStart[1]] == 0)
		currentPath = findPath(world,pathStart,pathEnd);
	}
	redraw();

}

function redraw()
{
	if (!spritesheetLoaded) return;

	console.log('redrawing...');

	var spriteNum = 0;

	// clear the screen
	ctx.fillStyle = '#000000';
	ctx.fillRect(0, 0, canvas.width, canvas.height);

	for (var x=0; x < worldWidth; x++)
	{
		for (var y=0; y < worldHeight; y++)
		{

			// choose a sprite to draw
			switch(world[x][y])
			{
			case 1:
				spriteNum = 11;
				break;
			default:
				spriteNum = 0;
				break;
			}

			// draw it
			// ctx.drawImage(img,sx,sy,swidth,sheight,x,y,width,height);
			ctx.drawImage(spritesheet,
			spriteNum*tileWidth, 0,
			tileWidth, tileHeight,
			x*tileWidth, y*tileHeight,
			tileWidth, tileHeight);

		}
	}
	
		for (var y=2; y < worldHeight-3; y++)
		{
			x=2;

			// choose a sprite to draw
			spriteNum = 11;

			// draw it
			// ctx.drawImage(img,sx,sy,swidth,sheight,x,y,width,height);
			ctx.drawImage(spritesheet,
			spriteNum*tileWidth, 0,
			tileWidth, tileHeight,
			x*tileWidth, y*tileHeight,
			tileWidth, tileHeight);

		}

                for (var y=2; y < worldHeight-3; y++)
		{
			x=0;

			// choose a sprite to draw
			spriteNum = 11;

			// draw it
			// ctx.drawImage(img,sx,sy,swidth,sheight,x,y,width,height);
			ctx.drawImage(spritesheet,
			spriteNum*tileWidth, 0,
			tileWidth, tileHeight,
			x*tileWidth, y*tileHeight,
			tileWidth, tileHeight);

		}
          
                for (var y=2; y < worldHeight-3; y++)
		{
			x=6;

			// choose a sprite to draw
			spriteNum = 11;

			// draw it
			// ctx.drawImage(img,sx,sy,swidth,sheight,x,y,width,height);
			ctx.drawImage(spritesheet,
			spriteNum*tileWidth, 0,
			tileWidth, tileHeight,
			x*tileWidth, y*tileHeight,
			tileWidth, tileHeight);

		}

                for (var y=2; y < worldHeight-3; y++)
		{
			x=8;

			// choose a sprite to draw
			spriteNum = 11;

			// draw it
			// ctx.drawImage(img,sx,sy,swidth,sheight,x,y,width,height);
			ctx.drawImage(spritesheet,
			spriteNum*tileWidth, 0,
			tileWidth, tileHeight,
			x*tileWidth, y*tileHeight,
			tileWidth, tileHeight);

		}

                
		{
			x=3;
                        y=2;

			// choose a sprite to draw
			spriteNum = 11;

			// draw it
			// ctx.drawImage(img,sx,sy,swidth,sheight,x,y,width,height);
			ctx.drawImage(spritesheet,
			spriteNum*tileWidth, 0,
			tileWidth, tileHeight,
			x*tileWidth, y*tileHeight,
			tileWidth, tileHeight);
                       
                        x=5;
y=2;
// draw it
			// ctx.drawImage(img,sx,sy,swidth,sheight,x,y,width,height);
			ctx.drawImage(spritesheet,
			spriteNum*tileWidth, 0,
			tileWidth, tileHeight,
			x*tileWidth, y*tileHeight,
			tileWidth, tileHeight);
                       
		}
		var i1=7;

		for (var y=3; y < worldHeight-3; y++)
		{
			x=3;
			

			// choose a sprite to draw
			spriteNum = i1;

			// draw it
			// ctx.drawImage(img,sx,sy,swidth,sheight,x,y,width,height);
			ctx.drawImage(spritesheet,
			spriteNum*tileWidth, 0,
			tileWidth, tileHeight,
			x*tileWidth, y*tileHeight,
			tileWidth, tileHeight);
			--i1;

		}
		var i2=10;

		for (var y=3; y < worldHeight-3; y++)
		{
			x=5;
			

			// choose a sprite to draw
			spriteNum = i2;

			// draw it
			// ctx.drawImage(img,sx,sy,swidth,sheight,x,y,width,height);
			ctx.drawImage(spritesheet,
			spriteNum*tileWidth, 0,
			tileWidth, tileHeight,
			x*tileWidth, y*tileHeight,
			tileWidth, tileHeight);
			--i2;

		}

		for (var x=2; x < worldWidth-2; x=x+1)
	{
		y=7;
			spriteNum = 1;

			// draw it
			// ctx.drawImage(img,sx,sy,swidth,sheight,x,y,width,height);
			ctx.drawImage(spritesheet,
			spriteNum*tileWidth, 0,
			tileWidth, tileHeight,
			x*tileWidth, y*tileHeight,
			tileWidth, tileHeight);
		
	}
	

	// draw the path
	console.log('Current path length: '+currentPath.length);
	
	for (rp=0; rp<currentPath.length; rp++)
	{
		switch(rp)
		{
		case 0:
			spriteNum = 2; // start
			break;
		case currentPath.length-1:
			spriteNum = 3; // end
			break;
		default:
			spriteNum = 4; // path node
			break;
		}

		ctx.drawImage(spritesheet,
		spriteNum*tileWidth, 0,
		tileWidth, tileHeight,
		currentPath[rp][0]*tileWidth,
		currentPath[rp][1]*tileHeight,
		tileWidth, tileHeight);
	}		
}

// handle click events on the canvas
function canvasClick(e)
{
	var x;
	var y;
	var a;
	var b;

	// grab html page coords
	if (e.pageX != undefined && e.pageY != undefined)
	{
		x = e.pageX;
		y = e.pageY;
	}
	else
	{
		x = e.clientX + document.body.scrollLeft +
		document.documentElement.scrollLeft;
		y = e.clientY + document.body.scrollTop +
		document.documentElement.scrollTop;
	}

	// make them relative to the canvas only
	x -= canvas.offsetLeft;
	y -= canvas.offsetTop;

	// return tile x,y that we clicked
	var cell =
	[
	Math.floor(x/tileWidth),
	Math.floor(y/tileHeight)
	];

	a=Math.floor(x/tileWidth);
	b=Math.floor(y/tileHeight);

	

	// now we know while tile we clicked
	console.log('we clicked tile '+cell[0]+','+cell[1]);
	world[a][b]=0;

	pathStart = pathEnd;
	pathEnd = cell;

	// calculate path
	currentPath = findPath(world,pathStart,pathEnd);
	console.log(currentPath);
	world[a][b]=1;
	console.log(a);
	console.log(b);
	redraw();
	var test ;

	
	if(a==3 && b==5){	
		Socket.send('1');
		
	}
	if(a==3 && b==4){
		Socket.send('2');
	}
	if(a==3 && b==3){
		Socket.send('3');
	}
	if(a==5 && b==5){
		Socket.send('4');

	}
	if(a==5 && b==4){
		Socket.send('5');
	
	}
	if(a==5 && b==3){
		Socket.send('6');
	
	}
	
}

// world is a 2d array of integers (eg world[10][15] = 0)
// pathStart and pathEnd are arrays like [5,10]
function findPath(world, pathStart, pathEnd)
{
	// shortcuts for speed
	var	abs = Math.abs;
	var	max = Math.max;
	var	pow = Math.pow;
	var	sqrt = Math.sqrt;

	// the world data are integers:
	// anything higher than this number is considered blocked
	// this is handy is you use numbered sprites, more than one
	// of which is walkable road, grass, mud, etc
	var maxWalkableTileNum = 0;

	// keep track of the world dimensions
    // Note that this A-star implementation expects the world array to be square: 
	// it must have equal height and width. If your game world is rectangular, 
	// just fill the array with dummy values to pad the empty space.
	var worldWidth = world[0].length;
	var worldHeight = world.length;
	var worldSize =	worldWidth * worldHeight;

	// which heuristic should we use?
	// default: no diagonals (Manhattan)
	var distanceFunction = ManhattanDistance;
	var findNeighbours = function(){}; // empty

	

	// alternate heuristics, depending on your game:

	// diagonals allowed but no sqeezing through cracks:
	//var distanceFunction = DiagonalDistance;
	//var findNeighbours = DiagonalNeighbours;
	/*

	// diagonals and squeezing through cracks allowed:
	var distanceFunction = DiagonalDistance;
	var findNeighbours = DiagonalNeighboursFree;
	

	// euclidean but no squeezing through cracks:
	var distanceFunction = EuclideanDistance;
	var findNeighbours = DiagonalNeighbours;

	// euclidean and squeezing through cracks allowed:
	var distanceFunction = EuclideanDistance;
	var findNeighbours = DiagonalNeighboursFree;

	*/

	// distanceFunction functions
	// these return how far away a point is to another

	function ManhattanDistance(Point, Goal)
	{	// linear movement - no diagonals - just cardinal directions (NSEW)
		return abs(Point.x - Goal.x) + abs(Point.y - Goal.y);
	}

	function DiagonalDistance(Point, Goal)
	{	// diagonal movement - assumes diag dist is 1, same as cardinals
		return max(abs(Point.x - Goal.x), abs(Point.y - Goal.y));
	}

	function EuclideanDistance(Point, Goal)
	{	// diagonals are considered a little farther than cardinal directions
		// diagonal movement using Euclide (AC = sqrt(AB^2 + BC^2))
		// where AB = x2 - x1 and BC = y2 - y1 and AC will be [x3, y3]
		return sqrt(pow(Point.x - Goal.x, 2) + pow(Point.y - Goal.y, 2));
	}

	// Neighbours functions, used by findNeighbours function
	// to locate adjacent available cells that aren't blocked

	// Returns every available North, South, East or West
	// cell that is empty. No diagonals,
	// unless distanceFunction function is not Manhattan
	function Neighbours(x, y)
	{
		var	N = y - 1,
		S = y + 1,
		E = x + 1,
		W = x - 1,
		myN = N > -1 && canWalkHere(x, N),
		myS = S < worldHeight && canWalkHere(x, S),
		myE = E < worldWidth && canWalkHere(E, y),
		myW = W > -1 && canWalkHere(W, y),
		result = [];
		if(myN)
		result.push({x:x, y:N});
		if(myE)
		result.push({x:E, y:y});
		if(myS)
		result.push({x:x, y:S});
		if(myW)
		result.push({x:W, y:y});
		findNeighbours(myN, myS, myE, myW, N, S, E, W, result);
		return result;
	}

	// returns every available North East, South East,
	// South West or North West cell - no squeezing through
	// "cracks" between two diagonals
	function DiagonalNeighbours(myN, myS, myE, myW, N, S, E, W, result)
	{
		if(myN)
		{
			if(myE && canWalkHere(E, N))
			result.push({x:E, y:N});
			if(myW && canWalkHere(W, N))
			result.push({x:W, y:N});
		}
		if(myS)
		{
			if(myE && canWalkHere(E, S))
			result.push({x:E, y:S});
			if(myW && canWalkHere(W, S))
			result.push({x:W, y:S});
		}
	}

	// returns every available North East, South East,
	// South West or North West cell including the times that
	// you would be squeezing through a "crack"
	function DiagonalNeighboursFree(myN, myS, myE, myW, N, S, E, W, result)
	{
		myN = N > -1;
		myS = S < worldHeight;
		myE = E < worldWidth;
		myW = W > -1;
		if(myE)
		{
			if(myN && canWalkHere(E, N))
			result.push({x:E, y:N});
			if(myS && canWalkHere(E, S))
			result.push({x:E, y:S});
		}
		if(myW)
		{
			if(myN && canWalkHere(W, N))
			result.push({x:W, y:N});
			if(myS && canWalkHere(W, S))
			result.push({x:W, y:S});
		}
	}

	// returns boolean value (world cell is available and open)
	function canWalkHere(x, y)
	{
		return ((world[x] != null) &&
			(world[x][y] != null) &&
			(world[x][y] <= maxWalkableTileNum));
	};

	// Node function, returns a new object with Node properties
	// Used in the calculatePath function to store route costs, etc.
	function Node(Parent, Point)
	{
		var newNode = {
			// pointer to another Node object
			Parent:Parent,
			// array index of this Node in the world linear array
			value:Point.x + (Point.y * worldWidth),
			// the location coordinates of this Node
			x:Point.x,
			y:Point.y,
			// the heuristic estimated cost
			// of an entire path using this node
			f:0,
			// the distanceFunction cost to get
			// from the starting point to this node
			g:0
		};

		return newNode;
	}

	// Path function, executes AStar algorithm operations
	function calculatePath()
	{
		// create Nodes from the Start and End x,y coordinates
		var	mypathStart = Node(null, {x:pathStart[0], y:pathStart[1]});
		var mypathEnd = Node(null, {x:pathEnd[0], y:pathEnd[1]});
		// create an array that will contain all world cells
		var AStar = new Array(worldSize);
		// list of currently open Nodes
		var Open = [mypathStart];
		// list of closed Nodes
		var Closed = [];
		// list of the final output array
		var result = [];
		// reference to a Node (that is nearby)
		var myNeighbours;
		// reference to a Node (that we are considering now)
		var myNode;
		// reference to a Node (that starts a path in question)
		var myPath;
		// temp integer variables used in the calculations
		var length, max, min, i, j;
		// iterate through the open list until none are left
		while(length = Open.length)
		{
			max = worldSize;
			min = -1;
			for(i = 0; i < length; i++)
			{
				if(Open[i].f < max)
				{
					max = Open[i].f;
					min = i;
				}
			}
			// grab the next node and remove it from Open array
			myNode = Open.splice(min, 1)[0];
			// is it the destination node?
			if(myNode.value === mypathEnd.value)
			{
				myPath = Closed[Closed.push(myNode) - 1];
				do
				{
					result.push([myPath.x, myPath.y]);
				}
				while (myPath = myPath.Parent);
				// clear the working arrays
				AStar = Closed = Open = [];
				// we want to return start to finish
				result.reverse();
			}
			else // not the destination
			{
				// find which nearby nodes are walkable
				myNeighbours = Neighbours(myNode.x, myNode.y);
				// test each one that hasn't been tried already
				for(i = 0, j = myNeighbours.length; i < j; i++)
				{
					myPath = Node(myNode, myNeighbours[i]);
					if (!AStar[myPath.value])
					{
						// estimated cost of this particular route so far
						myPath.g = myNode.g + distanceFunction(myNeighbours[i], myNode);
						// estimated cost of entire guessed route to the destination
						myPath.f = myPath.g + distanceFunction(myNeighbours[i], mypathEnd);
						// remember this new path for testing above
						Open.push(myPath);
						// mark this node in the world graph as visited
						AStar[myPath.value] = true;
					}
				}
				// remember this route as having no more untested options
				Closed.push(myNode);
			}
		} // keep iterating until the Open list is empty
		return result;
	}

	// actually calculate the a-star path!
	// this returns an array of coordinates
	// that is empty if no path is possible
	return calculatePath();

} // end of findPath() function


</script>

</head>

<body onload='onload()'>

<div>
	<h1> Warehouse Map </h1>
</div>
<div><canvas id="gameCanvas"></canvas></div>


 <div>
 <a href="http://localhost/Ecommerce/WMS/view_order.php"><button>Back</button></a>


 </div>
		
		
  </div>
  <br>



</body>
</html>

