const c = "pintura", D = (o, i) => {
  if (!o || !i)
    return;
  const { appendEditor: h, appendDefaultEditor: d, isSupported: l, dispatchEditorEvents: y } = i;
  if (!l()) {
    o.fn[c] = () => {
    };
    return;
  }
  const E = (t) => !t.length || typeof t[0] == "object", b = (t, n) => {
    const e = Object.getOwnPropertyDescriptor(t, n);
    return e ? typeof e.get < "u" : !1;
  }, m = (t, n) => {
    const e = Object.getOwnPropertyDescriptor(t, n);
    return e ? typeof e.set < "u" : !1;
  }, w = (t, n) => typeof t[n] == "function", p = /* @__PURE__ */ new Map(), a = (t) => function(...n) {
    const e = [], O = this.each(function() {
      if (E(n)) {
        const u = t(this, n[0]), g = y(u, this);
        u.on("destroy", () => {
          g.forEach((j) => j()), p.delete(this);
        }), p.set(this, u);
        return;
      }
      const r = p.get(this);
      if (!r)
        return;
      const s = n[0], f = n.concat().slice(1);
      if (w(r, s)) {
        e.push(r[s].apply(r, f));
        return;
      }
      if (m(r, s) && f.length) {
        r[s] = f[0];
        return;
      }
      if (b(r, s)) {
        e.push(r[s]);
        return;
      }
      console.warn("$()." + c + '("' + s + '") is an unknown property or method.');
    });
    return e.length ? this.length === 1 ? e[0] : e : O;
  };
  o.fn[c] = a(h), o.fn[c + "Default"] = a(d), Object.keys(i).forEach((t) => o.fn[c][t] = i[t]);
};
export {
  D as default
};
