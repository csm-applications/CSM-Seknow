/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.com.GCEval.model;

import com.fasterxml.jackson.annotation.JsonIgnore;
import java.io.Serializable;
import java.util.List;
import javax.persistence.Basic;
import javax.persistence.CascadeType;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.JoinTable;
import javax.persistence.ManyToMany;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.OneToMany;
import javax.persistence.Table;
import javax.validation.constraints.NotNull;
import javax.validation.constraints.Size;
import javax.xml.bind.annotation.XmlRootElement;
import javax.xml.bind.annotation.XmlTransient;

/**
 *
 * @author vini_
 */
@Entity
@Table(name = "grouping")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Grouping.findAll", query = "SELECT g FROM Grouping g"),
    @NamedQuery(name = "Grouping.findByIdGroup", query = "SELECT g FROM Grouping g WHERE g.idGroup = :idGroup"),
    @NamedQuery(name = "Grouping.findByName", query = "SELECT g FROM Grouping g WHERE g.name = :name")})
public class Grouping implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "idGroup")
    private Integer idGroup;
    @Basic(optional = false)
    @NotNull
    @Size(min = 1, max = 100)
    @Column(name = "name")
    private String name;
    @JoinTable(name = "group_has_permission", joinColumns = {
        @JoinColumn(name = "Group_idGroup", referencedColumnName = "idGroup")}, inverseJoinColumns = {
        @JoinColumn(name = "Permission_idPermission", referencedColumnName = "idPermission")})
    @ManyToMany
    private List<Permission> permissionList;
    @OneToMany(cascade = CascadeType.ALL, mappedBy = "grouping")
    @JsonIgnore
    private List<Useraccount> useraccountList;

    public Grouping() {
    }

    public Grouping(Integer idGroup) {
        this.idGroup = idGroup;
    }

    public Grouping(Integer idGroup, String name) {
        this.idGroup = idGroup;
        this.name = name;
    }

    public Integer getIdGroup() {
        return idGroup;
    }

    public void setIdGroup(Integer idGroup) {
        this.idGroup = idGroup;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    @XmlTransient
    public List<Permission> getPermissionList() {
        return permissionList;
    }

    public void setPermissionList(List<Permission> permissionList) {
        this.permissionList = permissionList;
    }

    @XmlTransient
    public List<Useraccount> getUseraccountList() {
        return useraccountList;
    }

    public void setUseraccountList(List<Useraccount> useraccountList) {
        this.useraccountList = useraccountList;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idGroup != null ? idGroup.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Grouping)) {
            return false;
        }
        Grouping other = (Grouping) object;
        if ((this.idGroup == null && other.idGroup != null) || (this.idGroup != null && !this.idGroup.equals(other.idGroup))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "br.com.GCEval.model.Grouping[ idGroup=" + idGroup + " ]";
    }
    
}
