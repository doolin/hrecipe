

describe("hRecipe", function() {

  describe("hRecipe/view/admin", function() {

    it("displays with intially closed block", function() {
      expect(jQuery(".hrecipe-options-tip:visible").length).toEqual(0);
    });

  });

  describe("SpecRunner file examples (below)", function() {

    // USe toBeVisible, etc: https://github.com/velesin/jasmine-jquery/blob/master/spec/suites/jasmine-jquery-spec.js#L493
    it("displays copy/paste version with block closed initially", function() {
      expect(jQuery(".hrecipe-options-t1p:visible").length).toEqual(0);
    });

  });

  // https://github.com/velesin/jasmine-jquery
  describe("hRecipe formatting", function() {

    describe("ISO time formatting function", function() {

      it("ISO time should be formatted in a span element", function() {
        expect($(format_iso_time(100))).toBe('span')
      });

      it("ISO time should be formatted in a span element", function() {
        expect($(format_iso_time(100))).toHaveClass('hritem')
      });

      it("title attribute should have proper ISO formatted time", function() {
        var iso_time = $(format_iso_time(110));
        expect(iso_time).toHaveAttr('title', 'PT1H50M')
      });

    });

  });

});