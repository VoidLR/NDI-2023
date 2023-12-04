const gravity = 300;
const walk_speed = 160;

const jump_force = -(gravity + 30);

const config = {
    type: Phaser.AUTO,
    width: 800,
    height: 600,
    physics: {
        default: 'arcade',
        arcade: {
            gravity: { y: gravity },
            debug: false
        }
    },
    scene: {
        preload: preload,
        create: create,
        update: update,
    }
};

const game = new Phaser.Game(config);

// Global variables

// game entities or game objects
let platforms;
let stars;
let bombs;

// player object
let player;
let gameOver = false;

// game scoring system
let score = 0;
let scoreText;

// game inputs
let cursors;

function collectStar(player, star) {
    star.disableBody(true, true);

    score += 10;
    scoreText.setText('score: ' + score)

    if(stars.countActive(true) === 0){ // if there's no remaining stars
        stars.children.iterate(function (star) {
            star.enableBody(true, star.x, 0, true, true);
        });


        let x = (player.x < 400) ? Phaser.Math.Between(400, 800) : Phaser.Math.Between(0, 400);

        let bomb = bombs.create(x, 16, 'bomb');

        bomb.setBounce(1);
        bomb.setCollideWorldBounds(true);
        bomb.setVelocity(Phaser.Math.Between(-200, 200), 20);
    }
}

function hitBomb(player, bomb) {
    this.physics.pause()

    player.setTint(0xFF0000); // set player to red tint
    player.anims.play('turn');
    gameOver = true;
}

function preload ()
{
    this.load.image('sky', 'assets/game/sky.png');
    this.load.image('ground', 'assets/game/platform.png');
    this.load.image('star', 'assets/game/star.png');
    this.load.image('bomb', 'assets/game/bomb.png');
    this.load.spritesheet('dude', 'assets/game/dude.png', { frameWidth: 32, frameHeight: 48 });
}

function create ()
{
    // Background placing
    this.add.image(400, 300, 'sky');

    // Platforms placing
    platforms = this.physics.add.staticGroup();

    platforms.create(400, 568, 'ground').setScale(2).refreshBody();
    platforms.create(600, 400, 'ground');
    platforms.create(50 , 250, 'ground');
    platforms.create(750, 220, 'ground');

    // player creation
    player = this.physics.add.sprite(100, 450, 'dude');

    player.setBounce(0.2);
    player.setCollideWorldBounds(true);

    this.anims.create({
        key: 'left',
        frames: this.anims.generateFrameNumbers('dude', { start: 0, end: 3 }),
        frameRate: 10,
        repeat: -1
    });

    this.anims.create({
        key: 'turn',
        frames: [ { key: 'dude', frame: 4 } ],
        frameRate: 20
    });

    this.anims.create({
        key: 'right',
        frames: this.anims.generateFrameNumbers('dude', { start: 5, end: 8 }),
        frameRate: 10,
        repeat: -1
    });

    this.physics.add.collider(player, platforms);

    cursors = this.input.keyboard.createCursorKeys();

    stars = this.physics.add.group({
        key: 'star',
        repeat: 11, // 1 default + 11 repeat -> 12 stars
        setXY: { x: 12, y: 0, stepX: 70}
    })

    stars.children.iterate(function (star) {
        star.setBounceY(Phaser.Math.FloatBetween(0.2, 0.8))
    });

    this.physics.add.collider(stars, platforms);
    this.physics.add.overlap(player, stars, collectStar, null, this);

    scoreText = this.add.text(16, 16, 'score: 0', { fontSize: '16px', fill: '#000'});

    bombs = this.physics.add.group();
    this.physics.add.collider(bombs, platforms);
    this.physics.add.collider(player, bombs, hitBomb, null, this);

}

function update ()
{
    if (cursors.left.isDown) {
        player.setVelocityX(-walk_speed);
        player.anims.play('left', true);
    } else if (cursors.right.isDown) {
        player.setVelocityX(walk_speed);
        player.anims.play('right', true);
    } else {
        player.setVelocityX(0);
        player.anims.play('turn');
    }

    if (cursors.up.isDown && player.body.touching.down)
    {
        player.setVelocityY(jump_force);
    }
}