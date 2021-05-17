export const filtersMixins = {
  filters: {
    boolVal(val) {
      const YES = "Yes";
      const NO = "No";
      return !!val ? YES : NO;
    }
  }
}
