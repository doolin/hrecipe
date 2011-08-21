

describe("hRecipe", function() {

  it("displays copy/paste version with block closed initially", function() {
    expect(jQuery(".hrecipe-options-t1p:visible").length).toEqual(0);
  });
  
  it("displays with intially closed block", function() {
    expect(jQuery(".hrecipe-options-tip:visible").length).toEqual(0);
  });

});