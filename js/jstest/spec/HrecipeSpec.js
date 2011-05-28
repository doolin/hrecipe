

describe("hRecipe", function() {
  var player;
  var song;

  beforeEach(function() {
    player = new Player();
    song = new Song();
  });

  it("should be able to play a Song", function() {
    player.play(song);
    expect(player.currentlyPlayingSong).toEqual(song);

    //demonstrates use of custom matcher
    expect(player).toBePlaying(song);
  });

  // demonstrates use of spies to intercept and test method calls
  it("tells the current song if the user has made it a favorite", function() {
    spyOn(song, 'persistFavoriteStatus');

    player.play(song);
    player.makeFavorite();

    expect(song.persistFavoriteStatus).toHaveBeenCalledWith(true);
  });

  it("displays copy/paste version with block closed initially", function() {
    expect(jQuery(".hrecipe-options-t1p:visible").length).toEqual(0);
  });
  
  it("display with intially closed block", function() {
    expect(jQuery(".hrecipe-options-tip:visible").length).toEqual(0);
  });

});