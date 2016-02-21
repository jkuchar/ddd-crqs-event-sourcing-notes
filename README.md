# Event-Sourcing basic example app

Aim: learn basics of event-sourcing pattern and its caveats.

This project builds on example from presentation from [Mathias Verraes - Practical Event Sourcing](http://verraes.net/2014/03/practical-event-sourcing/).
 
More reading:
- https://www.youtube.com/watch?v=whCk1Q87_ZI
- https://gist.github.com/SzymonPobiega/5220595
- https://cqrs.files.wordpress.com/2010/11/cqrs_documents.pdf
- http://subscriptions.viddler.com/GregYoung

## Notes / TODOs

- [ ] How to make proper relation between Product and Basket?
- [ ] How to access product name when product-related event occurs - aggregate does not expose any state?! (should I access read model from write model?)
- [ ] If aggregate produces event but it does not change state in any way, should it have empty apply() method for this event or should framework just skip this event. (this can lead into hard discoverable typo errors)
- [ ] Is there any point of adding events when loading from history into object "recoded events"?

