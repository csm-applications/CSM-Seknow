package br.com.GCEval.resource;

import br.com.GCEval.model.Company;
import br.com.GCEval.model.Grouping;
import br.com.GCEval.model.Useraccount;
import br.com.GCEval.repository.UseraccountRepository;
import java.net.URLDecoder;
import java.util.List;
import java.util.Optional;
import javax.validation.Valid;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
@RequestMapping("/users")
public class UserAccountResource {

    @Autowired
    private UseraccountRepository userAccountRepository;

    @GetMapping
    public List<Useraccount> findAll() {
        return userAccountRepository.findAll();
    }

    @GetMapping("/{id}")
    public Optional<Useraccount> findById(@PathVariable Integer id) {

        Optional<Useraccount> userAccounts = userAccountRepository.findById(id);
        return userAccounts;

    }

    @GetMapping("/companies/{id}")
    public List<Company> findCompaniesByUserId(@PathVariable Integer id) {

        Optional<Useraccount> userAccounts = userAccountRepository.findById(id);
        return userAccounts.get().getCompanyList();

    }
    
   

    @GetMapping("/findbyemail/{email}")
    public Optional<Useraccount> findByMail(@PathVariable String email) {
        Useraccount ac = new Useraccount();
        ac.setEmail(email);
        Optional<Useraccount> userAccount = userAccountRepository.findByEmail(ac.getEmail());
        return userAccount;

    }
    
    @GetMapping("/filterbyname/{nome}")
    public List<Useraccount> findByName(@PathVariable String nome) {
        System.out.println(URLDecoder.decode(nome));
        List<Useraccount> userAccounts = userAccountRepository.findByNomeContainingIgnoreCase(URLDecoder.decode(nome));
        return userAccounts;

    }

    @PostMapping
    public ResponseEntity<Useraccount> create(@Valid @RequestBody Useraccount user) {
        Grouping gp = new Grouping();
        gp.setIdGroup(2);
        user.setGrouping(gp);
        user.setActive((short) 1);
        System.out.println(user.toString());
        Useraccount userSaved = userAccountRepository.save(user);
        return ResponseEntity.status(HttpStatus.CREATED).body(userSaved);
    }
    
    @PutMapping
    public ResponseEntity<Useraccount> update(@Valid @RequestBody Useraccount user) {
        Useraccount userSaved = userAccountRepository.save(user);
        return ResponseEntity.status(HttpStatus.CREATED).body(userSaved);
    }
    
}
